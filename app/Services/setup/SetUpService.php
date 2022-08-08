<?php

namespace App\Services\setup;

use App\Models\question_id_in_setup;
use App\Models\Setups;
use App\Models\Answer;
use App\Models\Comment;
use App\Services\id\IDService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SetUpService {
    public function create($request) {
        try {
            Setups::create([
                'user_id' => $request->input('user_id'),
                'candidate_id' => $request->input('candidate_id')
            ]);
            $values = Setups::select('id')->orderBy('id', 'asc')->get();
            $setup_id = '';
            foreach ($values as $key => $value) {
                $setup_id = $value->id;
            }
            $question_id = '';
            for ($i = 1; $i < 11; $i++) {
                $question_id = $request->input('question_id_'.$i);
                if ($question_id != '') {
                    $i_d_s_id = IDService::getID($question_id);
                    IDService::insert($setup_id, $i_d_s_id);
                }
            }
            Session::flash('success', 'Setup Câu Hỏi Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Setup Câu Hỏi thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function load($id) {
        return question_id_in_setup::select(
            'question_id_in_setups.id as id', 'users.name as interview_name',
            'users.id as interview_id','candidates.id as candidate_id',
            'candidates.name as candidate_name', 'categories.id as category_id',
            'categories.category as category_name', 'questions.id as question_id',
            'questions.question as question_question')
        ->join('setups', 'setups.id', '=', 'question_id_in_setups.setup_id')
        ->join('users', 'users.id', '=', 'setups.user_id')
        ->join('candidates', 'candidates.id', '=', 'setups.candidate_id')
        ->join('i_d_s', 'i_d_s.id', '=', 'question_id_in_setups.i_d_s_id')
        ->join('questions', 'questions.id', '=', 'i_d_s.question_id')
        ->join('categories', 'categories.id', '=', 'i_d_s.category_id')
        ->where('candidates.id', $id)->get();
    }

    public function insert($request) {
        try {
            for ($i = 1; $i < 11; $i++) {
                $answer_id = 0;
                $answer = $request->input('answer_'.$i);
                $question_id_in_setup_id = $request->input('question_id_'.$i);
                if ($answer != '') {
                    Answer::create([
                        'question_id_in_setup_id' => $question_id_in_setup_id,
                        'answer' => $answer
                    ]);
                    $values = Answer::select('id')->orderBy('id', 'asc')->get();
                    foreach ($values as $key => $value) {
                        $answer_id = $value->id;
                    }
                }
                if ($answer_id != 0) {
                    Comment::create([
                        'answer_id' => $answer_id,
                        'comment' => $request->input('comment')
                    ]);
                }
            }
            Session::flash('success', 'Lưu Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }
}