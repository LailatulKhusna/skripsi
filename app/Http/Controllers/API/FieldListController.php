<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FieldList;

class FieldListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldlists= FieldList::with('branch','question_lists','field')->get();
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
        $fieldlist= new FieldList;
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
        $fieldlist=FieldList::with('question_lists')->find($id);
        
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
        $fieldlist=FieldList::find($id);
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
        $fieldlist= FieldList::with('branch','question_lists','field')->find($id);
        $fieldlist->delete();

        return response()->json($fieldlist);
    }
}
