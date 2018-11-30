<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Field;
use App\Models\Review;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions= Session::with('branch','field','review')->get();
        return response()->json($sessions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        $count = Session::where('branch_id',$request['user']['branch_id
            '])->count();
        $session = new Session;
        $session->branch_id = $request['session']['branch_id'];
        $session->name = $request['session']['name'].($count+1);
        $session->save();


        if(isset($request['fields'])){
           foreach ($request['fields'] as $field) {
                $fields = new Field;
                $fields->session_id=$session->id;
                $fields->field_list_id=$field['field_list_id'];
                $fields->name=$field['name'];
                $fields->description=$field['description'];
                $fields->save();
            } 
        }

        if(isset($request['review'])){
            $review = new Review;
            $review->session_id= $session->id;
            $review->name=$request['review']['name'];
            $review->save();
        }

        $result = Session::with('review', 'fields')->find($session->id);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session=Session::find($id);
        return response()->json($session);
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
        $sessions= Session::with('branch','field','review')->find($id);
        $sessions->fill($request->all());
        $sessions->save();

        

        return response()->json($sessions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessions= Session::find($id);
        $sessions->delete();

        return response()->json($sessions);
    }
}
