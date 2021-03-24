<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class OtbController extends Controller
{
    public function index() {
        $bottombanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
        );

        $topbanner = DB::select(
            DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
        );

        $mapProvince = DB::select(
            DB::raw("select distinct province from hb_map where status = 1 order by province asc")
        );

       

    	return view('otb')->with('data', ['bottombanner' => $bottombanner,'topbanner' => $topbanner, 'mapProvince' => $mapProvince]);
    }

    public function getMapCity(Request $request) {
        $d = $request->all();

        $mCity = DB::table('hb_map')
        ->select('city')
        ->distinct()
        ->where('province','=',$d['_province'])
        ->where('status','=',1)
        ->orderBy('city','ASC')
        ->get();

        return response()->json( ['data' => $mCity]);

    }

    public function getAddress(Request $request) {
        $d = $request->all();

        $mAddress = DB::table('hb_map')
        ->select('address','longitude','latitude')
        ->distinct()
        ->where('province','=',$d['_province'])
        ->where('city','=',$d['_city'])
        ->where('status','=',1)
        ->orderBy('address','ASC')
        ->get();

        return response()->json( ['data' => $mAddress]);
    }

    
}