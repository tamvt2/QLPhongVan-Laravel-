<?php

namespace App\Services\question;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class QuestionService {
    public function getCate() {
        return Category::select('id', 'category')->get();
    }

    public function create($request) {
        try {
            Question::create([
                'question' => $request->input('question'),
                'category_id' => $request->input('category_id')
            ]);

            Session::flash('success', 'Thêm Câu Hỏi Thanh Công');
        } catch (\Exception $e) {
            Session::flash($e->getMessage());
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Question::orderBy('category_id', 'asc')->paginate(15);
    }

    public function update($request, $question) {
        try {
            $question->fill([
                'question' => $request->input('question'),
                'category_id' => $request->input('category_id')
            ]);
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
        return Question::select('id', 'question')->where('category_id', $id)->get();
    }
}