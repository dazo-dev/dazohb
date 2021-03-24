<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HorsesController extends Controller
{
    public function index()
    {
        $horseList = DB::table('hb_horse')
                    ->leftJoin('hb_jockey', 'hb_jockey.id', '=', 'hb_horse.h_j_id')
                    ->leftJoin('hb_owner', 'hb_owner.id', '=', 'hb_horse.h_o_id')
                    ->leftJoin('hb_trainer', 'hb_trainer.id', '=', 'hb_horse.h_t_id')
                    ->select(
                        'hb_horse.*', 'hb_jockey.j_name', 'hb_jockey.j_jrte',
                        'hb_owner.o_name', 'hb_trainer.t_name','hb_horse.h_img_path','hb_horse.status'
                    )
                    ->where('hb_horse.status','=',1)
                    ->get();

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );

        return view('horses')->with('data', ['horses' => $horseList,'bottombanner' => $bottombanner,'topbanner' => $topbanner]);
    }

    public function filterList(Request $request){

        $targetYear = $request->targetYear;

        if ($targetYear == 'All Records') {
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filtered = DB::table('hb_horse')
                        ->leftJoin('hb_jockey', 'hb_jockey.id', '=', 'hb_horse.h_j_id')
                        ->leftJoin('hb_owner', 'hb_owner.id', '=', 'hb_horse.h_o_id')
                        ->leftJoin('hb_trainer', 'hb_trainer.id', '=', 'hb_horse.h_t_id')
                        ->select(
                            'hb_horse.*', 'hb_jockey.j_name', 'hb_jockey.j_jrte',
                            'hb_owner.o_name', 'hb_trainer.t_name'
                        )
                        ->get();
        }else{
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filtered = DB::table('hb_horse')
                ->leftJoin('hb_jockey', 'hb_jockey.id', '=', 'hb_horse.h_j_id')
                ->leftJoin('hb_owner', 'hb_owner.id', '=', 'hb_horse.h_o_id')
                ->leftJoin('hb_trainer', 'hb_trainer.id', '=', 'hb_horse.h_t_id')
                ->leftJoin('hb_r_details', 'hb_r_details.h_id', '=', 'hb_horse.id')
                ->leftJoin('hb_r_prog', 'hb_r_prog.id', '=', 'hb_r_details.r_id')
                ->select(
                    'hb_horse.*', 'hb_jockey.j_name', 'hb_jockey.j_jrte',
                    'hb_owner.o_name', 'hb_trainer.t_name'
                )
                ->where('hb_r_prog.r_date', 'like', '%'.$targetYear.'%')
                ->groupBy('hb_horse.id')
                ->get();
        }

        $res['data'] = $filtered;
        $res['success'] = true;

        return response($res, 200);

    }

    public function getDetails( $slug = null){

        // $curDate = Carbon::now()->startOfDay()->toDateString();

        $horseDetails = DB::table('hb_horse')
                        ->leftJoin('hb_jockey', 'hb_jockey.id', '=', 'hb_horse.h_j_id')
                        ->leftJoin('hb_owner', 'hb_owner.id', '=', 'hb_horse.h_o_id')
                        ->leftJoin('hb_trainer', 'hb_trainer.id', '=', 'hb_horse.h_t_id')
                        ->select(
                            'hb_horse.*', 'hb_jockey.j_name',
                            'hb_owner.o_name', 'hb_trainer.t_name'
                        )
                        ->where('hb_horse.id','=',$slug)
                        ->get();

        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();
        $results = DB::select( 
                        // DB::raw(
                        //     "SELECT x.r_track, x.r_group, y.r_length, y.best, y.h_id
                        //      FROM hb_r_prog x
                        //      JOIN 
                        //         ( SELECT t1.r_id, t1.h_id, t2.r_length, MIN(t1.h_f_time) as best 
                        //             FROM hb_r_result t1
                        //             JOIN hb_r_prog t2
                        //             ON t2.id = t1.r_id
                        //             GROUP
                        //             BY t2.r_length ) y
                        //         ON y.r_id = x.id
                        //       WHERE y.h_id = $slug
                        //     "
                        // )
                        DB::raw("select a.id,b.r_length,a.r_track,a.r_group,a.r_t_type,best,b.h_id from hb_r_prog as a
                        left outer join(select x.id,y.h_id,x.r_length, min(y.h_f_time) as best from hb_r_prog as x left outer join hb_r_result as y on x.id = y.r_id where y.h_id = ". $slug ." and y.h_pos is not null group by x.r_length) as b
                        on a.id = b.id
                        where b.h_id = " . $slug)
                    );



        $horseRaceCurrent = DB::select(
            DB::raw("select a.r_id,a.h_id,a.j_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,a.h_weight,d.j_name,b.r_replay from hb_r_details as a
            left outer join (select id,r_date,r_track,r_length,r_group,r_t_type,r_replay from hb_r_prog) as b
            on a.r_id = b.id
            left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
            on a.r_id = c.r_id and a.h_id = c.h_id
            left outer join (select id,j_name from hb_jockey) as d
            on a.j_id = d.id
            left outer join (select id,h_name from hb_horse) as e
            on a.h_id = e.id
            where a.h_id = ". $slug ." and b.r_date is not null and year(b.r_date) = year(now()) and c.h_pos is not null order by b.r_date desc")
        );

        $horseRandom = DB::select(
            DB::raw("SELECT a.id, a.h_name, a.h_j_id, b.j_name, a.h_o_id, c.o_name, a.h_t_id, d.t_name, coalesce(e.numwins,0) as wins1,a.h_img_path from hb_horse as a
            left outer join (select id,j_name from hb_jockey) as b
            on a.h_j_id = b.id
            left outer join (select id,o_name from hb_owner) as c
            on a.h_o_id = c.id
            left outer join (select id,t_name from hb_trainer) as d
            on a.h_t_id = d.id
            left outer join (select h_id,count(h_pos) as numwins from hb_r_result where h_pos = 1 group by h_id) as e
            on a.id = e.h_id
            order by RAND() LIMIT 10")
        );
                            

       

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );


        return view('horsedetails')
                ->with('data', [
                        'horseRaceCurrent' => $horseRaceCurrent,
                        // 'horseRacelastTwo' => $previousRace,
                  //       'horseName' => $horseName,
                        'horseDetails' => $horseDetails,
                        'horseRace' => $results,
                        'bottombanner' => $bottombanner,
                        'horseRandom' => $horseRandom,
                        'topbanner' => $topbanner
                    ]
                );

    }


    function filterrace(Request $request) {
        $id = $request->input('id');
        $xyear = $request->input('xyear');
        // dd($xyear);
        if ($xyear == 'CURRENT YEAR') {
            $filteredlist = DB::select(
                DB::raw("select a.r_id,a.h_id,a.j_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,a.h_weight,d.j_name,b.r_replay from hb_r_details as a
                left outer join (select id,r_date,r_track,r_length,r_group,r_t_type,r_replay from hb_r_prog) as b
                on a.r_id = b.id
                left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
                on a.r_id = c.r_id and a.h_id = c.h_id
                left outer join (select id,j_name from hb_jockey) as d
                on a.j_id = d.id
                left outer join (select id,h_name from hb_horse) as e
                on a.h_id = e.id
                where a.h_id = ". $id ." and b.r_date is not null and year(b.r_date) = year(now()) and c.h_pos is not null order by b.r_date desc")
            );
        }
        else {
            $filteredlist = DB::select(
                DB::raw("select a.r_id,a.h_id,a.j_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,a.h_weight,d.j_name,b.r_replay from hb_r_details as a
                left outer join (select id,r_date,r_track,r_length,r_group,r_t_type,r_replay from hb_r_prog) as b
                on a.r_id = b.id
                left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
                on a.r_id = c.r_id and a.h_id = c.h_id
                left outer join (select id,j_name from hb_jockey) as d
                on a.j_id = d.id
                left outer join (select id,h_name from hb_horse) as e
                on a.h_id = e.id
                where a.h_id = ". $id ." and b.r_date is not null and year(b.r_date) = year(now())-1 and c.h_pos is not null order by b.r_date desc")
            );
        }
        // dd($filteredlist);
        $res['data'] = $filteredlist;
        $res['success'] = true;

        return response($res, 200);

    }
}