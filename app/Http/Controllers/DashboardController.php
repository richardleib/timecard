<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard home
    |--------------------------------------------------------------------------
    */
    public function home() {
        return view('dashboard.home');
    }
}
