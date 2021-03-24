<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessagerespoController extends Controller
{
    public function index() {
        return view('messagerespo');
    }
}