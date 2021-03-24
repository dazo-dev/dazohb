<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );  
        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );    
        return view('subscription')->with('data',['bottombanner' => $bottombanner,'topbanner' => $topbanner]);
        
        
    }
}
