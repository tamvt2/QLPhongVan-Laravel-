<?php

namespace App\Services\question;

use App\Models\Category;
use App\Models\ID;
use App\Models\Question;
use App\Services\id\IDService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class QuestionService {
    public function getCate() {
        return Category::select('categories.id as id', 'categories.category as category')->join('i_d_s', 'i_d_s.category_id', '=', 'categories.id')->distinct()->get();
    }

    public function create($request) {
        try {
            Question::create([
                'question' => $request->input('question'),
            ]);
            $values = Question::select('id')->orderBy('id', 'asc')->get();
            $category_id = $request->input('category_id');
            $question_id = '';
            foreach ($values as $key => $value) {
                $question_id = $value->id;
            }

            IDService::create($category_id, $question_id);
            Session::flash('success', 'Thêm Câu Hỏi Thanh Công');
        } catch (\Exception $e) {
            Session::flash($e->getMessage());
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Question::select('questions.id as question_id',
            'questions.question as question',
            'categories.id as category_id',
            'i_d_s.id as id')
        ->join('i_d_s', 'i_d_s.question_id', '=', 'questions.id')
        ->join('categories', 'i_d_s.category_id', '=', 'categories.id')
        ->orderBy('categories.id', 'asc')
        ->paginate(15);
    }

    public function update($request, $question, $id) {
        try {
            $question->fill([
                'question' => $request->input('question')
            ]);
            $id->fill([
                'category_id' => $request->input('category_id')
            ]);
            $id->save();
            $question->save();
            Session::flash('success', 'Cập nhật Câu Hỏi thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật Câu Hỏi thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Question::where('id', $id)->first();
        if ($value) {
            return Question::where('id', $id)->delete();
        }
        return false;
    }

    public function getQuestion($id) {
        return ID::select("questions.id", "questions.question")->join('questions', 'i_d_s.question_id', '=', 'questions.id')->where('category_id', $id)->get();
    }
}