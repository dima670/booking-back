<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Resources\ClientCollection;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $stringSearch = $request->input('search');
            $clients = Client::whereRaw("CONCAT('first_name', ' ', 'last_name', ' ', 'middle_name')
                'ILIKE' '%'.$stringSearch.'%'")->get();
        } else {
            $clients = Client::all();

        }
        $response = new ClientCollection($clients);

        return $this->sendResponse($response, 'Success Ok');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
