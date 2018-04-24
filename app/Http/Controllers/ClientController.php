<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Http\Resources\ClientResource;
use App\Client;

class ClientController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | API: Index
    |--------------------------------------------------------------------------
    */
    public function api_index(Request $request) {
        return ClientResource::collection(Auth::user()->clients);
    }
}
