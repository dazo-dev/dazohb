<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RaceProg;

class RaceController extends Controller
{
    public function getSelected(Request $request){

    	$tempSDate = $request->targetdate." 00:00:00";
    	$tempEDate = $request->targetdate." 23:59:59";

    	$raceResult = DB::table('events')
						->join('raceclass', 'events.race_class', '=', 'raceclass.id')
						->join('racetype', 'events.race_type', '=', 'racetype.id')
						->select('events.*', 'racetype.type_name', 'raceclass.class_name')
    	              	->whereBetween('race_start', [$tempSDate, $tempEDate])
    	              	->limit(6)
    	              	->get();

    	if ($raceResult->isEmpty()) {
    		$res['success'] = false;
    	}else{
    		$res['data'] = $raceResult;
    		$res['success'] = true;
    	}

        return response($res, 200);
    }


    public function raceHorses(Request $request){
        // var_dump($request->all());
        // die();

        $targetId = $request->targetId;
        $targetDate = $request->targetDate;


        $raceDetails = DB::table('hb_r_details')
                    ->leftJoin('hb_horse', 'hb_r_details.h_id', '=', 'hb_horse.id')
                    ->leftJoin('hb_jockey', 'hb_r_details.j_id', '=', 'hb_jockey.id')
                    ->select(
                        'hb_r_details.*',
                        'hb_horse.h_name',
                        'hb_jockey.j_name'
                    )
                    ->where('hb_r_details.r_id', $targetId)
                    ->get();

        $tipster = RaceProg::where('id', $targetId)
                   ->where('r_date', $targetDate)
                   ->get();


        $bet = DB::table('hb_r_details')
                   ->where('r_id', $targetId)
                   ->get();


        if ($raceDetails->isEmpty()) {
            $res['success'] = false;
        }else{
            $res['data'] = $raceDetails;
            $res['tip'] = $tipster;
            $res['bet'] = $bet;
            $res['success'] = true;
        }

        $user = auth()->user()['subscription_type'];
        $res['activeuser'] = $user;
        return response($res, 200);
    }

    public function lastFiverace( $slug = null, Request $request){

        $all = $request->all();

        if ($slug == 'race') {
           $lastFive = DB::select(
                DB::raw("select b.r_date,b.r_length,d.j_name,c.h_pos, b.r_replay from hb_r_details as a
            left outer join (select id,r_date,r_track,r_length,r_group,r_t_type, r_replay from hb_r_prog) as b
            on a.r_id = b.id
            left outer join (select id,j_name from hb_jockey) as d
            on a.j_id = d.id
            left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
            on a.r_id = c.r_id and a.h_id = c.h_id
            where a.h_id = ". $all['targethorseid'] ." and b.r_date is not null and c.h_pos is not null order by b.r_date desc LIMIT 5")
            );

            $res['tbl'] = $slug;
            $res['data'] = $lastFive;
            $res['success'] = true;

        }

        if ($slug == 'dist') {
           $lastdist = DB::select(
                DB::raw("select a.h_id,b.r_track,b.r_length,b.r_t_type,min(c.finishtime) as besttime,e.h_name from hb_r_details as a 
            left outer join (select id,r_date,r_track,r_length,r_group,r_t_type from hb_r_prog) as b on a.r_id = b.id 
            left outer join (select r_id,h_id,min(h_f_time) as finishtime from hb_r_result where h_id = ". $all['targethorseid'] ." group by r_id,h_id) as c on a.r_id = c.r_id and a.h_id = c.h_id 
            left outer join (select id,h_name from hb_horse where id = ". $all['targethorseid'] .") as e on a.h_id = e.id 
            where a.h_id = ". $all['targethorseid'] ." and c.finishtime is not null 
            group by a.h_id,b.r_track,b.r_length,b.r_t_type,e.h_name 
            order by b.r_length asc")
            );

            $res['tbl'] = $slug;
            $res['data'] = $lastdist;
            $res['success'] = true;

        }

        if ($slug == 'jockey') {
           $jockeyDetails = DB::select(
                DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_bground,a.j_started,a.j_jrte,coalesce(b.y_pos,0) as numwins,coalesce(c.y1_pos,0) as numwins2,coalesce(d.y2_pos,0) as numwins3,coalesce(e.racenum,0) as rnum,coalesce(count(f.y_count),0) as ycount,a.status from hb_jockey as a
            left outer join (select x.j_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 and x.j_id = ".$all['targethorseid']." group by x.j_id) as b
            on a.id = b.j_id
            left outer join (select x1.j_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 and x1.j_id = ".$all['targethorseid']." group by x1.j_id) as c
            on a.id = c.j_id
            left outer join (select x2.j_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 and x2.j_id = ".$all['targethorseid']." group by x2.j_id) as d
            on a.id = d.j_id
            left outer join (select j_id,count(j_id) as racenum from hb_r_details where j_id = ".$all['targethorseid']." group by j_id) as e
            on a.id = e.j_id
            left outer join (select distinct x4.j_id,year(x3.r_date) as y_count from hb_r_prog as x3 left outer join hb_r_details as x4 on x3.id = x4.r_id where x4.j_id = ".$all['targethorseid']." group by x4.j_id,year(x3.r_date)) as f
            on a.id = f.j_id
            where a.id = ". $all['targethorseid'] ." 
            group by a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_bground,a.j_started,a.j_jrte,numwins,numwins2,numwins3,rnum,a.status")
            );

            $res['tbl'] = $slug;
            $res['data'] = $jockeyDetails;
            $res['success'] = true;

        }

        if ($slug == 'trainer') {
           $tDetails = DB::select(
            DB::raw("select a.id,a.t_name,a.t_sex,a.t_age,a.t_nation,a.t_bground,a.t_started,coalesce(b.y_pos,0) as numwins,coalesce(c.y1_pos,0) as numwins2,coalesce(d.y2_pos,0) as numwins3,coalesce(e.racenum,0) as rnum,a.status from hb_trainer as a
            left outer join (select x.t_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 group by x.t_id) as b
            on a.id = b.t_id
            left outer join (select x1.t_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 group by x1.t_id) as c
            on a.id = c.t_id
            left outer join (select x2.t_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 group by x2.t_id) as d
            on a.id = d.t_id
            left outer join (select t_id,count(t_id) as racenum from hb_r_details group by t_id) as e
            on a.id = e.t_id
            where a.id = ". $all['targethorseid'] )
            );


            $res['tbl'] = $slug;
            $res['data'] = $tDetails;
            $res['success'] = true;

        }

        if ($slug == 'owner') {
            $odetails = DB::select(
            DB::raw("select a.id,a.o_name,a.o_sex,a.o_age,a.o_nation,a.o_bground,a.o_started,coalesce(b.y_pos,0) as numwins,coalesce(c.y1_pos,0) as numwins2,coalesce(d.y2_pos,0) as numwins3,coalesce(e.racenum,0) as rnum,a.status from hb_owner as a
            left outer join (select x.o_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 group by x.o_id) as b
            on a.id = b.o_id
            left outer join (select x1.o_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 group by x1.o_id) as c
            on a.id = c.o_id
            left outer join (select x2.o_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 group by x2.o_id) as d
            on a.id = d.o_id
            left outer join (select o_id,count(o_id) as racenum from hb_r_details group by o_id) as e
            on a.id = e.o_id
            where a.id = ". $all['targethorseid'] ." order by a.o_name asc")
            );


            $res['tbl'] = $slug;
            $res['data'] = $odetails;
            $res['success'] = true;

        }
        


        return response($res, 200);

    }



    public function getAllresult( Request $request ){

        $allDetails = $request->all();

        $yResults = DB::table('hb_r_prog')
                    ->where('r_date', date('Y-m-d',(strtotime ( $allDetails['targetDate'] ) )))
                    ->where('id', $allDetails['targetId'])
                    ->get();

        $betResult = DB::table('hb_b_result')
                    ->where('bet_id', $allDetails['targetId'])
                    ->where('br_amount', '!=', null)
                    ->get();

        $allres = DB::table('hb_r_result')
                    ->leftJoin('hb_r_details', function($join){
                        $join->on('hb_r_result.r_id', '=', 'hb_r_details.r_id');
                        $join->on('hb_r_result.h_id', '=', 'hb_r_details.h_id');
                    })
                    ->leftJoin('hb_horse', 'hb_r_details.h_id', '=', 'hb_horse.id')
                    ->leftJoin('hb_jockey', 'hb_r_details.j_id', '=', 'hb_jockey.id')
                    ->select('hb_r_result.*', 'hb_r_details.h_weight', 'hb_r_details.j_id', 'hb_r_details.h_num', 'hb_horse.h_name', 'hb_jockey.j_name')
                    ->where('hb_r_result.r_id', $allDetails['targetId'])
                    ->get();

        $res['allres'] = $allres;
        $res['bres'] = $betResult;
        $res['data'] = $yResults;
        $res['success'] = true;

        return response($res, 200);
    }

    public function getTrack( Request $request ){

        $allDetails = $request->all();

        // echo $allDetails['activeDate'];

        // var_dump($allDetails);die();

        $genDate = explode("-", $allDetails['activeDate']);

        $startD = $genDate[0]."-".$genDate[1]."-1";
        $endD = $genDate[0]."-".$genDate[1]."-31";


        // $curTrack = DB::table('hb_r_prog')->where('r_date', $allDetails['activeDate'])->get();
        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();
        $curTrack = DB::select(
            DB::raw("select a.*, COUNT(b.r_id) as resCount from hb_r_prog a LEFT JOIN hb_r_result b  ON a.id = b.r_id  WHERE r_date = '".$allDetails['activeDate']."'")
            );

        // $curTrack = DB::table('hb_r_prog')->whereBetween('r_date', [$startD, $endD])->orderBy('r_date', 'asc')->get();

        $res['data'] = $curTrack;
        $res['success'] = true;

        return response($res, 200);
    }
}
