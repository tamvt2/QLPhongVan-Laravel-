<?php

namespace App\Services\setup;

use App\Models\SetupQuestion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SetUpService {
    public function create($request) {
        try {
            SetupQuestion::create($request->input());
            Session::flash('success', 'Setup Câu Hỏi Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Setup Câu Hỏi thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function load($id) {
        return SetupQuestion::select()->where('candidate_id', $id)->get();
    }
}