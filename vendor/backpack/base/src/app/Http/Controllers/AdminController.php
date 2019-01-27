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
        with('sessions.fields.questions.answer','sessions.review')
        ->find(Auth::user()->branch_id);

        $data = [];

        foreach ($branch['sessions'] as $session) {

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

                if ($data[$field['name']]['total_importance'] == 0 || $data[$field['name']]['total_score'] == 0) {
                    $data[$field['name']]['csi'] = 0;                    
                } else {

                    $data[$field['name']]['csi'] = number_format(($data[$field['name']]['total_score']/(5*$data[$field['name']]['total_importance']))*100,0,'','');
                }

            }

        }

        return view('backpack::dashboard', ['title'=>$title,'fields'=>$data]);
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
