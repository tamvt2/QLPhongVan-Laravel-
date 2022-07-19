<?php

namespace App\Http\Controllers\setupquestion;

use App\Http\Controllers\Controller;
use App\Services\setup\SetUpService;
use App\Services\candidate\CandidateService;
use App\Services\interview\InterviewService;
use App\Services\question\QuestionService;
use Illuminate\Http\Request;

class SetupquestionController extends Controller
{
    protected $interview, $candidate, $question, $setup;
    
    public function __construct(InterviewService $interview, CandidateService $candidate, QuestionService $question, SetUpService $setup) {
        $this->interview = $interview;
        $this->candidate = $candidate;
        $this->question = $question;
        $this->setup = $setup;
    }

    public function index() {
        return view('setupquestion.add', [
            'title' => 'Setup Question',
            'interviews' => $this->interview->getAll(),
            'candidates' => $this->candidate->getAll()
        ]);
    }

    public function store() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        $results = $this->question->getQuestion($id);
        return $results;
    }

    public function create(Request $request) {
        $this->setup->create($request);
        return redirect()->back();
        // dd($request->input());
    }
}
