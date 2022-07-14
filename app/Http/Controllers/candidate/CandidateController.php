<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Services\candidate\CandidateService;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    protected $candidate;

    public function __construct(CandidateService $candidate) {
        $this->candidate = $candidate;
    }

    public function create() {
        return view('candidate.add', [
            'title' => 'Thêm Ứng Viên',
            'values' => $this->candidate->getCate()
        ]);
    }

    public function store(Request $request) {
        $this->candidate->create($request);
        return redirect()->back();
    }

    public function index() {
        return view('candidate.list', [
            'title' => 'Danh Sách Ứng Viên',
            'values' => $this->candidate->getAll()
        ]);
    }

    public function show(Candidate $candidate) {
        return view('candidate.edit', [
            'title' => 'Chỉnh Sửa Ứng Viên: '.$candidate->name,
            'value' => $candidate,
            'values' => $this->candidate->getCate()
        ]);
    }

    public function update(Request $request, Candidate $candidate) {
        $result = $this->candidate->update($request, $candidate);
        if ($result) {
            return redirect('/users/candidate/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->candidate->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Ứng Viên'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa Ứng Viên thất bại'
        ]);
    }
}
