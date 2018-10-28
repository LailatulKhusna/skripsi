<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OauthClient;

class OauthClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oauthclients=OauthClient::get();
        return response()->json($oauthclients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oauthclient= new OauthClient;
        $oauthclient->fill($request->all());
        $oauthclient->save();

        return response()->json($oauthclient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oauthclient= OauthClient::find($id);
        return response()->json($oauthclient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oauthclient= OauthClient::find($id);
        $oauthclient->fill($request->all());
        $oauthclient->save();

        return response()->json($oauthclient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oauthclient= OauthClient::find($id);
        $oauthclient->delete();
        
        return response()->json($oauthclient);

    }
}
