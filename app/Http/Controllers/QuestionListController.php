<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionList;
use App\Models\FieldList;
use Illuminate\Support\Facades\Auth;

class QuestionListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "yey";
        $data['fieldlists'] = FieldList::where('branch_id',Auth::user()->branch_id)->get();
        return view('pages.questionlist.create',$data);
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
        $questionlist= new QuestionList();
        $questionlist->fill($request->all());
        $questionlist->save();

        return redirect('/admin/questionlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['fieldlists'] = FieldList::where('branch_id',Auth::user()->branch_id)->get();
        $data['questionlist'] = QuestionList::find($id);
        // dd($data);
        return view('pages.questionlist.edit',$data);
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

        return redirect('/admin/questionlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
