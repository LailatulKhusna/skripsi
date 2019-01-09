<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Field;
use App\Models\Review;
use App\Models\Question;
use App\Models\Answer;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions= Session::with('branch','fields.questions.answer','review')->get();

        foreach ($sessions as $session) {

    		foreach ($session['fields'] as $field) {

    			$data[$field['name']]['total_performance'] = 0;
    			$data[$field['name']]['total_importance'] = 0;
    			$data[$field['name']]['total_score'] = 0;
    			$data[$field['name']]['csi'] = 0;
    			$data[$field['name']]['performance']['tp'] = 0;
				$data[$field['name']]['performance']['kp'] = 0;
				$data[$field['name']]['performance']['cp'] = 0;
				$data[$field['name']]['performance']['p']  = 0;
				$data[$field['name']]['performance']['sp'] = 0;
    			
    			foreach ($field['questions'] as $question) {

    				$data[$field['name']]['total_performance'] += $question['answer']['performance'];
    				$data[$field['name']]['total_importance'] += $question['answer']['importance'];
    				$data[$field['name']]['total_score'] += ($question['answer']['performance']*$question['answer']['importance']);

    				if ($question['answer']['performance'] == 1) {
    					$data[$field['name']]['performance']['tp'] += $question['answer']['performance'];
    				} elseif ($question['answer']['performance'] == 2) {
    					$data[$field['name']]['performance']['kp'] += $question['answer']['performance'];
    				} elseif ($question['answer']['performance'] == 3) {
    					$data[$field['name']]['performance']['cp'] += $question['answer']['performance'];
    				} elseif ($question['answer']['performance'] == 4) {
    					$data[$field['name']]['performance']['p'] += $question['answer']['performance'];
    				} elseif ($question['answer']['performance'] == 5) {
    					$data[$field['name']]['performance']['sp'] += $question['answer']['performance'];
    				}

    			}

    			$data[$field['name']]['csi'] = ($data[$field['name']]['total_score']/(5*$data[$field['name']]['total_importance']))*100;

    		}

        }
        return response()->json($data);
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


        if(isset($request['fields']) && sizeof($request['fields'])>0){
           foreach ($request['fields'] as $field) {
                $fields = new Field;
                $fields->session_id=$session->id;
                $fields->field_list_id=$field['id'];
                $fields->name=$field['name'];
                $fields->description=$field['description'];
                $fields->save();
                
                foreach ($field['question_lists'] as $question_list) {
                    $questions = new Question;
                    $questions->field_id=$fields->id;
                    $questions->question_list_id=$question_list['id'];
                    $questions->name=$question_list['name'];
                    $questions->save();


                    $answers = new Answer;
                    $answers->question_id=$questions->id;
                    $answers->importance=$question_list['importance'];
                    $answers->performance=$question_list['performance'];
                    $answers->save();
                }
            }

        }

        if(isset($request['review'])){
            $review = new Review;
            $review->session_id= $session->id;
            $review->name=$request['review']['name'];
            $review->save();
        }

        $result = Session::with('review', 'fields.questions.answer')->find($session->id);
        return response()->json([$result,$request]);
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
