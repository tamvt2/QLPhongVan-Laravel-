<?php

namespace App\Services\interview;

use App\Models\Interview;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class InterviewService {
    public function create($request) {
        try {
            Interview::create($request->input());

            Session::flash('success', 'Tạo Người Phỏng Vấn Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Tạo Người Phỏng Vấn thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return interview::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $interview) {
        try {
            $interview->fill(['name' => $request->input('name'),
                            'job' => $request->input('job')
                        ]);
            $interview->save();
            Session::flash('success', 'Cập nhật Người Phỏng Vấn thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật Người Phỏng Vấn thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Interview::where('id', $id)->first();
        if ($value) {
            return Interview::where('id', $id)->delete();
        }
        return false;
    }

    public static function getName($id) {
        $values = Interview::select('name')->where('id', $id)->get();
        $html = '';
        foreach ($values as $value) {
            $html .= $value->name;
        }
        return $html;
    }
}