<?php

namespace Backpack\Base\app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use App\Models\Branch;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $title = "Laporan"; // set the page title

        // $sessions= Session::with('branch','fields.questions.answer','review')->get();

        $branch = Branch::
        with('sessions.fields.questions.answer','sessions.review','sessions.questions.answer')
        ->find(Auth::user()->branch_id);

        $data = [];
        $result = [];
        $result['csi'] = 0;
        $result['total_importance'] = 0;
        $result['total_score'] = 0;
        $table = [];

        foreach ($branch['sessions'] as $s => $session) {
             # code...
            foreach ($session['fields'] as $f => $field) {
                # code...
                foreach ($field['questions'] as $q => $question) {
                    # code...
                    $table['importance'][$q]['value'] ?? $table['importance'][$q]['value'] = [];
                    array_push($table['importance'][$q]['value'],$question['answer']['importance']); 
                    $table['importance'][$q]['total'] ?? $table['importance'][$q]['total'] = 0;
                    $table['importance'][$q]['total'] += $question['answer']['importance'];
                    $table['importance'][$q]['average'] ?? $table['importance'][$q]['average'] = 0;
                    $table['importance'][$q]['average'] = $table['importance'][$q]['total']/count($table['importance'][$q]['value']);

                    $table['performance'][$q]['value'] ?? $table['performance'][$q]['value'] = [];
                    array_push($table['performance'][$q]['value'],$question['answer']['performance']); 
                    $table['performance'][$q]['total'] ?? $table['performance'][$q]['total'] = 0;
                    $table['performance'][$q]['total'] += $question['answer']['performance'];
                    $table['performance'][$q]['average'] ?? $table['performance'][$q]['average'] = 0;
                    $table['performance'][$q]['average'] = $table['performance'][$q]['total']/count($table['performance'][$q]['value']);

                    $table['merge']['value'][$q]['importance'] = $table['importance'][$q]['average'];
                    $table['merge']['value'][$q]['performance'] = $table['performance'][$q]['average'];

                    $table['merge']['value'][$q]['ixp'] = $table['merge']['value'][$q]['importance']*$table['merge']['value'][$q]['performance'];

                }
            }
        } 

        foreach ($table['merge']['value'] as $v => $val) {
            # code...
            $table['merge']['total_importance'] ?? $table['merge']['total_importance'] = 0;
            $table['merge']['total_importance'] += $val['importance'];

            $table['merge']['total_performance'] ?? $table['merge']['total_performance'] = 0;
            $table['merge']['total_performance'] += $val['performance'];

            $table['merge']['total_ixp'] ?? $table['merge']['total_ixp'] = 0;
            $table['merge']['total_ixp'] += $val['ixp'];
        }

        $table['csi'] = ($table['merge']['total_ixp'] / (5*$table['merge']['total_importance']))*100;



        // dd($branch);
        // return response()->json($table);

        foreach ($branch['sessions'] as $session) {

            foreach ($session['fields'] as $field) {

                $data[$field['name']]['total_performance'] = 0;
                $data[$field['name']]['performance']['tp'] = 0;
                $data[$field['name']]['performance']['kp'] = 0;
                $data[$field['name']]['performance']['cp'] = 0;
                $data[$field['name']]['performance']['p']  = 0;
                $data[$field['name']]['performance']['sp'] = 0;
                
                foreach ($field['questions'] as $question) {

                    $data[$field['name']]['total_performance'] += $question['answer']['performance'];
                    $result['total_importance'] += $question['answer']['importance'];
                    $result['total_score'] += ($question['answer']['performance']*$question['answer']['importance']);

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

            }

        }

        if ($result['total_importance'] == 0 || $result['total_score'] == 0) {
                $result['csi'] = 0;                    
        } else {
            $result['csi'] = number_format(($result['total_score']/(5*$result['total_importance']))*100,0,'','');
        }

        return view('backpack::dashboard', ['title'=>$title,'table'=>$table,'fields'=>$data,'result'=>$result]);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(backpack_url('dashboard'));
    }
}
