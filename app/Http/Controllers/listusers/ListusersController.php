<?php

namespace App\Http\Controllers\listusers;

use App\Http\Controllers\Controller;
use App\Services\candidate\CandidateService;
use App\Services\setup\SetUpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListusersController extends Controller
{
    protected $candidate, $setup;

    public function __construct(CandidateService $candidate, SetUpService $setup) {
        $this->candidate = $candidate;
        $this->setup = $setup;
    }

    public function index() {
        return view('listusers.list', [
            'title' => 'Danh Sách Ứng Viên',
            'values' => $this->candidate->getList()
        ]);
    }

    public function show($id) {
        $result = $this->setup->load($id);
        // return view('listusers.add', [
        //     'title' => 'Phỏng Vấn',
        //     'values' => $result
        // ]);
        return response()->json([
            'data' => $result,
            'message' => 'success'
        ]);
    }

    public function insert(Request $request) {
        $this->setup->insert($request);
        return redirect()->back();
    }
}
