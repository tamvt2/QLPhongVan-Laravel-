<?php

namespace App\Services\id;

use App\Models\ID;
use App\Models\Question;
use App\Models\question_id_in_setup;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class IDService {
    public static function create($category_id, $question_id) {
        try {
            ID::create([
                'category_id' => $category_id,
                'question_id' => $question_id
            ]);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function insert($setup_id, $i_d_s_id) {
        try {
            question_id_in_setup::create([
                'setup_id' => $setup_id,
                'i_d_s_id' => $i_d_s_id
            ]);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function getID($question_id) {
        $values = ID::select('id')->where('question_id', $question_id)->get();
        $id = '';
        foreach ($values as $key => $value) {
            $id = $value->id;
        }
        return $id;
    }

    public static function getQuestion($id) {
        return Question::select('question_id_in_setup.id as id')
        ->join('i_d_s', 'i_d_s.question_id', '=', 'questions.id')
        ->join('question_id_in_setups', 'question_id_in_setup.i_d_s', '=', 'i_d_s.id')
        ->where('question.id', $id)
        ->get();
    }
}