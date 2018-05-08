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
    | Detail
    |--------------------------------------------------------------------------
    */
    public function detail(Client $client) {
        return $client->name;
    }

    /*
    |--------------------------------------------------------------------------
    | API: Index
    |--------------------------------------------------------------------------
    */
    public function api_index(Request $request) {
        return ClientResource::collection(Auth::user()->clients);
    }

    /*
    |--------------------------------------------------------------------------
    | API: Create
    |--------------------------------------------------------------------------
    */
    public function api_create(Request $request) {
        $this->validate($request, [
            'name'  =>  'required',
        ]);

        // Create the client model and relationship
        try {
            $client =   Client::create([
                            'name'          =>  $request->name,
                            'description'   =>  $request->get('description', null),
                        ]);
                
            Auth::user()->clients()->syncWithoutDetaching($client->id);
        }
        catch(\Exception $e) {
            \Log::error('Error creating and connecting client', [
                'err_msg'	=>	$e->getMessage(),
                'request'   =>  $request->all(),
            ]);
            throw new \Exception('Error creating and connecting client');
        }

        // TODO: Handle the icon

        return new ClientResource($client);
    }
}
