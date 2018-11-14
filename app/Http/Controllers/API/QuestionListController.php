<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionList;

class QuestionListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionlists= QuestionList::with('field_list','question')->get();
        return response()->json($questionlists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionlist= new QuestionList();
        $questionlist->fill($request->all());
        $questionlist->save();

        return response()->json($questionlist);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionlist= QuestionList::find($id);
        return response()->json($questionlist);
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
        $questionlist= QuestionList::with('field_list','question')->find($id);
        $questionlist->fill($request->all());
        $questionlist->save();

        return response()->json($questionlist);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionlist= QuestionList::find($id);
        $questionlist->delete();

        return response()->json($questionlist);
    }
}
