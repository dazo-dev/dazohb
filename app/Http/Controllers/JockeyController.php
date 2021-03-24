<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class JockeyController extends Controller
{
    public function index()
    {
        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();
        $jockeyList = DB::select(
            DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_jrte,coalesce(b.trace,0) as totalrace,coalesce(c.win1,0) as wins1,coalesce(d.win2,0) as wins2,coalesce(e.win3,0) as wins3 from hb_jockey as a
            left outer join (select a1.j_id,count(a1.j_id) as trace from hb_r_details as a1 left outer join hb_r_prog as b1 on a1.r_id = b1.id left outer join hb_r_result as c1 on a1.r_id = c1.r_id and a1.h_id = c1.h_id where c1.h_pos is not null group by a1.j_id) as b
            on a.id = b.j_id
            left outer join (select a2.j_id,count(c2.h_pos) as win1 from hb_r_details as a2 left outer join hb_r_prog as b2 on a2.r_id = b2.id left outer join hb_r_result as c2 on a2.r_id = c2.r_id and a2.h_id = c2.h_id where c2.h_pos = 1 group by a2.j_id) as c
            on a.id = c.j_id
            left outer join (select a3.j_id,count(c3.h_pos) as win2 from hb_r_details as a3 left outer join hb_r_prog as b3 on a3.r_id = b3.id left outer join hb_r_result as c3 on a3.r_id = c3.r_id and a3.h_id = c3.h_id where c3.h_pos = 2 group by a3.j_id) as d
            on a.id = d.j_id
            left outer join (select a4.j_id,count(c4.h_pos) as win3 from hb_r_details as a4 left outer join hb_r_prog as b4 on a4.r_id = b4.id left outer join hb_r_result as c4 on a4.r_id = c4.r_id and a4.h_id = c4.h_id where c4.h_pos = 3 group by a4.j_id) as e
            on a.id = e.j_id
            where a.status = 1")
        );

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );

        return view('jockey')->with('data', ['jList' => $jockeyList,'bottombanner' => $bottombanner,'topbanner' => $topbanner]);
        
    }

    public function filterList(Request $request){
        $targetYear = $request->targetYear;

        if ($targetYear == 'All Records') {
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filteredJockey = DB::select(
                DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_jrte,coalesce(b.trace,0) as totalrace,coalesce(c.win1,0) as wins1,coalesce(d.win2,0) as wins2,coalesce(e.win3,0) as wins3 from hb_jockey as a
                left outer join (select a1.j_id,count(a1.j_id) as trace from hb_r_details as a1 left outer join hb_r_prog as b1 on a1.r_id = b1.id left outer join hb_r_result as c1 on a1.r_id = c1.r_id and a1.h_id = c1.h_id where c1.h_pos is not null group by a1.j_id) as b
                on a.id = b.j_id
                left outer join (select a2.j_id,count(c2.h_pos) as win1 from hb_r_details as a2 left outer join hb_r_prog as b2 on a2.r_id = b2.id left outer join hb_r_result as c2 on a2.r_id = c2.r_id and a2.h_id = c2.h_id where c2.h_pos = 1 group by a2.j_id) as c
                on a.id = c.j_id
                left outer join (select a3.j_id,count(c3.h_pos) as win2 from hb_r_details as a3 left outer join hb_r_prog as b3 on a3.r_id = b3.id left outer join hb_r_result as c3 on a3.r_id = c3.r_id and a3.h_id = c3.h_id where c3.h_pos = 2 group by a3.j_id) as d
                on a.id = d.j_id
                left outer join (select a4.j_id,count(c4.h_pos) as win3 from hb_r_details as a4 left outer join hb_r_prog as b4 on a4.r_id = b4.id left outer join hb_r_result as c4 on a4.r_id = c4.r_id and a4.h_id = c4.h_id where c4.h_pos = 3 group by a4.j_id) as e
                on a.id = e.j_id
                where a.status = 1")
            );
        }else{
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filteredJockey = DB::select(
                DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_jrte,coalesce(b.trace,0) as totalrace,coalesce(c.win1,0) as wins1,coalesce(d.win2,0) as wins2,coalesce(e.win3,0) as wins3 from hb_jockey as a
                left outer join (select a1.j_id,count(a1.j_id) as trace from hb_r_details as a1 left outer join hb_r_prog as b1 on a1.r_id = b1.id left outer join hb_r_result as c1 on a1.r_id = c1.r_id and a1.h_id = c1.h_id where year(b1.r_date) = ".$targetYear." and c1.h_pos is not null group by a1.j_id) as b
                on a.id = b.j_id
                left outer join (select a2.j_id,count(c2.h_pos) as win1 from hb_r_details as a2 left outer join hb_r_prog as b2 on a2.r_id = b2.id left outer join hb_r_result as c2 on a2.r_id = c2.r_id and a2.h_id = c2.h_id where year(b2.r_date) = ".$targetYear." and c2.h_pos = 1 group by a2.j_id) as c
                on a.id = c.j_id
                left outer join (select a3.j_id,count(c3.h_pos) as win2 from hb_r_details as a3 left outer join hb_r_prog as b3 on a3.r_id = b3.id left outer join hb_r_result as c3 on a3.r_id = c3.r_id and a3.h_id = c3.h_id where year(b3.r_date) = ".$targetYear." and c3.h_pos = 2 group by a3.j_id) as d
                on a.id = d.j_id
                left outer join (select a4.j_id,count(c4.h_pos) as win3 from hb_r_details as a4 left outer join hb_r_prog as b4 on a4.r_id = b4.id left outer join hb_r_result as c4 on a4.r_id = c4.r_id and a4.h_id = c4.h_id where year(b4.r_date) = ".$targetYear." and c4.h_pos = 3 group by a4.j_id) as e
                on a.id = e.j_id
                where a.status = 1")
            );
        }

        $res['data'] = $filteredJockey;
        $res['success'] = true;

        return response($res, 200);
    }

    public function getDetails( $slug = null)
    {
        
    	$jockeyInfo = DB::select(
            DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_bground,a.j_started,a.j_jrte,coalesce(b.y_pos,0) as wins1,coalesce(c.y1_pos,0) as wins2,coalesce(d.y2_pos,0) as wins3,coalesce(e.racecount,0) as rcount,coalesce(count(f.y_count),0) as ycount,a.status,a.j_img_path from hb_jockey as a
            left outer join (select x.j_id,count(y.h_pos) as y_pos from hb_r_details as x left outer join hb_r_result as y on x.r_id = y.r_id where y.h_pos = 1 and x.j_id = ". $slug ." group by x.j_id) as b
            on a.id = b.j_id
            left outer join (select x1.j_id,count(y1.h_pos) as y1_pos from hb_r_details as x1 left outer join hb_r_result as y1 on x1.r_id = y1.r_id where y1.h_pos = 2 and x1.j_id = ". $slug ." group by x1.j_id) as c
            on a.id = c.j_id
            left outer join (select x2.j_id,count(y2.h_pos) as y2_pos from hb_r_details as x2 left outer join hb_r_result as y2 on x2.r_id = y2.r_id where y2.h_pos = 3 and x2.j_id = ". $slug ." group by x2.j_id) as d
            on a.id = d.j_id
            left outer join (select j_id,count(j_id) as racecount from hb_r_details where j_id = ". $slug ." group by j_id) as e
            on a.id = e.j_id
            left outer join (select distinct x4.j_id,year(x3.r_date) as y_count from hb_r_prog as x3 left outer join hb_r_details as x4 on x3.id = x4.r_id where x4.j_id = ". $slug ." group by x4.j_id,year(x3.r_date)) as f
            on a.id = f.j_id
            where a.id = ". $slug ." and a.status = 1
            group by a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_bground,a.j_started,a.j_jrte,wins1,wins2,wins3,rcount,a.status,a.j_img_path")
        );


        $jockeyRace = DB::select(
            DB::raw("select a.r_id,a.h_id,a.j_id,a.t_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,d.t_name,e.h_name,a.h_weight from hb_r_details as a
			left outer join (select id,r_date,r_track,r_length,r_group,r_t_type from hb_r_prog) as b
			on a.r_id = b.id
			left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
			on a.r_id = c.r_id and a.h_id = c.h_id
			left outer join (select id,t_name from hb_trainer) as d
			on a.t_id = d.id
			left outer join (select id,h_name from hb_horse) as e
			on a.h_id = e.id
			where a.j_id = ". $slug ." and b.r_date is not null and c.h_pos is not null order by b.r_date,c.h_pos asc")
        );

        $jockeyYears = DB::select(
            DB::raw("select distinct b.j_id,year(a.r_date) as ryears from hb_r_prog as a left outer join hb_r_details as b on a.id = b.r_id where b.j_id = ". $slug ." group by b.j_id,year(a.r_date) order by year(a.r_date) asc")
        );

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

    	$topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );

        $jockeyRandom = DB::select(
            DB::raw("select a.id,a.j_name,a.j_sex,a.j_age,a.j_nation,a.j_jrte,coalesce(b.trace,0) as totalrace,coalesce(c.win1,0) as wins1,coalesce(d.win2,0) as wins2,coalesce(e.win3,0) as wins3,a.j_img_path from hb_jockey as a
            left outer join (select a1.j_id,count(a1.j_id) as trace from hb_r_details as a1 left outer join hb_r_prog as b1 on a1.r_id = b1.id left outer join hb_r_result as c1 on a1.r_id = c1.r_id and a1.h_id = c1.h_id where c1.h_pos is not null group by a1.j_id) as b
            on a.id = b.j_id
            left outer join (select a2.j_id,count(c2.h_pos) as win1 from hb_r_details as a2 left outer join hb_r_prog as b2 on a2.r_id = b2.id left outer join hb_r_result as c2 on a2.r_id = c2.r_id and a2.h_id = c2.h_id where c2.h_pos = 1 group by a2.j_id) as c
            on a.id = c.j_id
            left outer join (select a3.j_id,count(c3.h_pos) as win2 from hb_r_details as a3 left outer join hb_r_prog as b3 on a3.r_id = b3.id left outer join hb_r_result as c3 on a3.r_id = c3.r_id and a3.h_id = c3.h_id where c3.h_pos = 2 group by a3.j_id) as d
            on a.id = d.j_id
            left outer join (select a4.j_id,count(c4.h_pos) as win3 from hb_r_details as a4 left outer join hb_r_prog as b4 on a4.r_id = b4.id left outer join hb_r_result as c4 on a4.r_id = c4.r_id and a4.h_id = c4.h_id where c4.h_pos = 3 group by a4.j_id) as e
            on a.id = e.j_id
            where a.status = 1 order by RAND() LIMIT 10")
        );


    


    	return view('jockeydetails')
                ->with('data', [
                        'jInfo' => $jockeyInfo, 
                        
                        'jockeyRace' => $jockeyRace,
                        'jockeyYears' => $jockeyYears,
                        'bottombanner' => $bottombanner,
                        'jockeyRandom' => $jockeyRandom,
                        'topbanner' => $topbanner
                        // 'jockeyName' => $jokceyName,
                        // 'stakeWon' => $stakewon,
                        // 'totalWins' => $totalWins,
                        // 'totalsecond' => $totalsecond,
                        // 'totalThird' => $totalThird,
                        // 'totalRide' => $totalRide,
                        // 'lasttenDays' => $lasttenDays,
                        // 'jAchievements' => $jockeyAchievement,
                        // 'jNotableWins' => $jockeynWins,
                    ]
                );
        
    }

    public function filterYear(Request $request){
        $targetYear = $request->targetYear;
        $targetid = $request->id;
        
        if ($targetYear == 'allyear') {
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filteredJockey = DB::select(
                DB::raw("select a.r_id,a.h_id,a.j_id,a.t_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,d.t_name,e.h_name,a.h_weight from hb_r_details as a
                left outer join (select id,r_date,r_track,r_length,r_group,r_t_type from hb_r_prog) as b
                on a.r_id = b.id
                left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
                on a.r_id = c.r_id and a.h_id = c.h_id
                left outer join (select id,t_name from hb_trainer) as d
                on a.t_id = d.id
                left outer join (select id,h_name from hb_horse) as e
                on a.h_id = e.id
                where a.j_id = ". $targetid ." and b.r_date is not null and c.h_pos is not null order by b.r_date,c.h_pos asc")
            );
        }else{
            config()->set('database.connections.mysql.strict', false);
            \DB::reconnect();
            $filteredJockey =  DB::select(
                DB::raw("select a.r_id,a.h_id,a.j_id,a.t_id,b.r_date,b.r_track,b.r_length,b.r_group,b.r_t_type,c.h_pos,c.h_f_time,c.h_half,c.h_quarter,d.t_name,e.h_name,a.h_weight from hb_r_details as a
                left outer join (select id,r_date,r_track,r_length,r_group,r_t_type from hb_r_prog) as b
                on a.r_id = b.id
                left outer join (select r_id,h_id,h_pos,h_f_time,h_half,h_quarter from hb_r_result) as c
                on a.r_id = c.r_id and a.h_id = c.h_id
                left outer join (select id,t_name from hb_trainer) as d
                on a.t_id = d.id
                left outer join (select id,h_name from hb_horse) as e
                on a.h_id = e.id
                where a.j_id = ". $targetid ." and year(b.r_date) = ". $targetYear ." and c.h_pos is not null order by b.r_date,c.h_pos asc")
            );
        }

        $res['data'] = $filteredJockey;
        $res['success'] = true;

        return response($res, 200);
    }
}
