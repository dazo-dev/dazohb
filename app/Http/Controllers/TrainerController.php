<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TrainerController extends Controller
{

    public function index() {
        $allTrainer = DB::select(
            DB::raw("select a.id,a.t_name,a.t_sex,a.t_age,a.t_nation,a.t_bground,a.t_started,coalesce(b.y_pos,0) as wins1,coalesce(c.y1_pos,0) as wins2,coalesce(d.y2_pos,0) as wins3,coalesce(e.racenum,0) as totalraces,a.status from hb_trainer as a
            left outer join (select x.t_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 group by x.t_id) as b
            on a.id = b.t_id
            left outer join (select x1.t_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 group by x1.t_id) as c
            on a.id = c.t_id
            left outer join (select x2.t_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 group by x2.t_id) as d
            on a.id = d.t_id
            left outer join (select x3.t_id,count(x3.t_id) as racenum from hb_r_details as x3 left outer join hb_r_result as y3 on x3.r_id = y3.r_id where y3.h_pos is not null  group by x3.t_id) as e
            on a.id = e.t_id
            where a.status = 1")
            );

        $bottombanner = DB::select(
                DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
            );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );
        
        return view('trainer')->with('data',['trainer' => $allTrainer,'bottombanner' => $bottombanner, 'topbanner' => $topbanner]);
    }

    public function getDetails($slug = null) {

        $trainerDetails = DB::select(
            DB::raw("select a.id,a.t_name,a.t_sex,a.t_age,a.t_nation,a.t_bground,a.t_started,coalesce(b.y_pos,0) as wins1,coalesce(c.y1_pos,0) as wins2,coalesce(d.y2_pos,0) as wins3,coalesce(e.racenum,0) as totalraces,a.status,a.t_img_path from hb_trainer as a
            left outer join (select x.t_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 group by x.t_id) as b
            on a.id = b.t_id
            left outer join (select x1.t_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 group by x1.t_id) as c
            on a.id = c.t_id
            left outer join (select x2.t_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 group by x2.t_id) as d
            on a.id = d.t_id
            left outer join (select x3.t_id,count(x3.t_id) as racenum from hb_r_details as x3 left outer join hb_r_result as y3 on x3.r_id = y3.r_id where y3.h_pos is not null  group by t_id) as e
            on a.id = e.t_id
            where a.id = ". $slug)
            );
        
        $trainerHorse = DB::table('hb_horse')
        ->leftJoin('hb_jockey','hb_horse.h_j_id','=','hb_jockey.id')
        ->leftJoin('hb_owner','hb_horse.h_o_id','=','hb_owner.id')
        ->select('hb_horse.*','hb_jockey.j_name','hb_jockey.j_jrte','hb_owner.o_name')
        ->where('hb_horse.h_t_id','=',$slug)            
        ->orderBy('hb_horse.h_name','asc')->get();

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


            return view('trainerdetails')
            ->with('data',['trainerHorse' => $trainerHorse,
            'trainerDetails' => $trainerDetails,
            'bottombanner' => $bottombanner,
            'horseRandom' => $horseRandom,
            'topbanner' => $topbanner]);
    }
}