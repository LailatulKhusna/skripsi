<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reviewlist;


class ReviewListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviewlists= Reviewlist::with('branch','review')->get();
        return response()->json($reviewlists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reviewlist= new Reviewlist();
        $reviewlist->fill($request->all());
        $reviewlist->save();

        return response()->json($reviewlist);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviewlist=Reviewlist::with('branch','review')->find($id);
        return response()->json($reviewlist);

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
        $reviewlist= Reviewlist::find($id);
        $reviewlist->fill($request->all());
        $reviewlist->save();

        return response()->json($reviewlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviewlist= Reviewlist::find($id);
        $reviewlist->delete();

        return response()->json($reviewlist);
    }
}
