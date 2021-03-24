<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $slug = null)
    {
        $isSubscribed = Auth::user()->is_subscribed;

        // $myDaily = DB::table('hb_subscription')->where( 'start_reg' , date('Y-m-d') )->orWhere( 'end_reg' , date('Y-m-d') )->where('user_id', Auth::user()->id)->dd();

        if ($slug == null) {
            $myDaily = DB::select(
                DB::raw("select count(*) as count from hb_subscription where user_id = ".Auth::user()->id." and (start_reg = '".date('Y-m-d')."' OR end_reg = '".date('Y-m-d')."')")
            );
        }else{
            $myDaily = DB::select(
                DB::raw("select count(*) as count from hb_subscription where user_id = ".Auth::user()->id." and (start_reg = '".$slug."' OR end_reg = '".$slug."')")
            );
        }

        

        if ($myDaily[0]->count != 0) {

            if ($slug == null) {
                $cResults = DB::table('hb_r_prog')
                        ->where('hb_r_prog.r_date', date('Y-m-d'))
                        // ->where('r_status', 1)
                        ->get();

                $yResults = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', date('Y-m-d'))
                            ->where('r_status', 0)
                            ->get();

                $hResults = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', date('Y-m-d'))
                            ->where('r_status', 0)
                            ->get();

                $withResult = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', date('Y-m-d'))
                            ->where('r_status', 0)
                            ->count();

                $withOutResult = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', date('Y-m-d'))
                            ->where('r_status', 1)
                            ->count();
            }else{
                $cResults = DB::table('hb_r_prog')
                        ->where('hb_r_prog.r_date', $slug)
                        // ->where('r_status', 1)
                        ->get();

                $yResults = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', $slug)
                            ->where('r_status', 0)
                            ->get();

                $hResults = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', $slug)
                            ->where('r_status', 0)
                            ->get();

                $withResult = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', $slug)
                            ->where('r_status', 0)
                            ->count();

                $withOutResult = DB::table('hb_r_prog')
                            ->where('hb_r_prog.r_date', $slug)
                            ->where('r_status', 1)
                            ->count();
            }

            


            $bottombanner = DB::select(
                DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
            );

            $topbanner = DB::select(
                DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
            ); 



            $ldate = date('Y-m-d H:i:s');
            $user = auth()->user()['sub_end'];
            $days;
            if ($user != NULL) {
                $diff = abs(strtotime($user) - strtotime($ldate));
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            }else{
                $days = 0;
            }

            $mapProvince = DB::select(
                DB::raw("select distinct province from hb_map where status = 1 order by province asc")
            );
            



            return view('subscribed')
            ->with('data', ['curDResults' => $cResults, 'yesDResults' => $yResults, 'hidDResults' => $hResults,
             'bottombanner' => $bottombanner,
             'topbanner' => $topbanner,
             'resCount' => $withResult,
             'ractiveCount' => $withOutResult,
             'subscriptionEnd' => $days,
             'mapProvince' => $mapProvince,
             'slug' => $slug != null ? $slug : ""
            ]);

            
            
        }else{

            $bottombanner = DB::select(
                DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
            );
            
            $topbanner = DB::select(
                DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
            ); 

            $mapProvince = DB::select(
                DB::raw("select distinct province from hb_map where status = 1 order by province asc")
            );
    
            

            return view('home')->with('data', ['bottombanner' => $bottombanner,'topbanner' => $topbanner, 'dailySub' => $myDaily, 'mapProvince' => $mapProvince]);

        }
    }
}