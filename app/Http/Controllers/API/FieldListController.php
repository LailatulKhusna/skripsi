<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fieldlist;

class FieldListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldlists= Fieldlist::with('branch','question_list','field')->get();
        return response()->json($fieldlists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fieldlist= new Fieldlist;
        $fieldlist->fill($request->all());
        $fieldlist->save();

        return response()->json($fieldlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fieldlist=Fieldlist::find($id);
        
        return response()->json($fieldlist);
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
        $fieldlist=Fieldlist::find($id);
        $fieldlist->fill($request->all());
        $fieldlist->save();

        return response()->json($fieldlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fieldlist= Fieldlist::with('branch','question_list','field')->find($id);
        $fieldlist->delete();

        return response()->json($fieldlist);
    }
}
