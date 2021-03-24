<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ForumController extends Controller
{
    public function index()
    {
        // $horseList = DB::table('hb_horse')
        //             ->leftJoin('hb_jockey', 'hb_jockey.id', '=', 'hb_horse.h_j_id')
        //             ->leftJoin('hb_owner', 'hb_owner.id', '=', 'hb_horse.h_o_id')
        //             ->leftJoin('hb_trainer', 'hb_trainer.id', '=', 'hb_horse.h_t_id')
        //             ->select(
        //                 'hb_horse.*', 'hb_jockey.j_name', 'hb_jockey.j_jrte',
        //                 'hb_owner.o_name', 'hb_trainer.t_name','hb_horse.h_img_path','hb_horse.status'
        //             )
        //             ->where('hb_horse.status','=',1)
        //             ->get();

        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );

    	return view('forum')->with('data', [/*'horses' => $horseList,*/'bottombanner' => $bottombanner,'topbanner' => $topbanner]);
    }
}
