<?php

namespace App\Http\Controllers\question;

use App\Http\Controllers\Controller;
use App\Models\ID;
use App\Models\Question;
use App\Services\question\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(QuestionService $question) {
        $this->question = $question;
    }

    public function create() {
        return view('question.add', [
            'title' => 'Thêm Câu Hỏi Phỏng Vấn',
            'values' => $this->question->getCate()
        ]);
    }

    public function store(Request $request) {
        $this->question->create($request);
        return redirect()->back();
    }

    public function index() {
        return view('question.list', [
            'title' => 'Danh Sách Câu Hỏi',
            'values' => $this->question->getAll()
        ]);
    }

    public function show(Question $question, ID $id) {
        return view('question.edit', [
            'title' => 'Chỉnh Sửa Câu Hỏi',
            'categories' => $id,
            'value' => $question,
            'values' => $this->question->getCate()
        ]);
    }

    public function update(Request $request, Question $question, ID $id) {
        $result = $this->question->update($request, $question, $id);
        if ($result) {
            return redirect('/users/question/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->question->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Câu Hỏi'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa Câu Hỏi thất bại'
        ]);
    }
}
