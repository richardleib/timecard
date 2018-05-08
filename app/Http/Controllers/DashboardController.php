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
        $clients    =   Auth::user()->clients;
        $projects   =   Auth::user()->projects;
        
        return view('dashboard.home')
                ->with('clients', $clients)
                ->with('projects', $projects);
    }
}
