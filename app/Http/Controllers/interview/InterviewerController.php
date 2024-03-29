<?php

namespace App\Http\Controllers\interview;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\User;
use App\Services\interview\InterviewService;
use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    protected $interview;

    public function __construct(InterviewService $interview) {
        $this->interview = $interview;
    }

    public function create() {
        return view('interview.add', [
            'title' => 'Thêm Người Phỏng Vấn'
        ]);
    }

    public function index() {
        return view('interview.list', [
            'title' => 'Danh Sách Người Phỏng Vấn',
            'values' => $this->interview->getAll()
        ]);
    }

    public function store(Request $request) {
        $this->interview->create($request);
        return redirect()->back();
    }

    public function show(User $user) {
        // dd($interview);
        return view('interview.edit', [
            'title' => 'Chỉnh Sửa Người Phỏng Vấn',
            'value' => $user
        ]);
    }

    public function update(Request $request, USer $user) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $result = $this->interview->update($request, $user);
        if ($result) {
            return redirect('/users/interview/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->interview->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Người Phỏng Vấn'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa Người Phỏng Vấn thất bại'
        ]);
    }
}
