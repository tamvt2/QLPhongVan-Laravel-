<?php

namespace App\Services\interview;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class InterviewService {
    public function create($request) {
        try {
            User::create($request->input());

            Session::flash('success', 'Tạo Người Phỏng Vấn Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Tạo Người Phỏng Vấn thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return User::orderBy('id', 'asc')->paginate(15);
    }

    public function update($request, $user) {
        try {
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
            $user->save();
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
        $value = User::where('id', $id)->first();
        if ($value) {
            return User::where('id', $id)->delete();
        }
        return false;
    }

    public static function getName($id) {
        $values = User::select('name')->where('id', $id)->get();
        $html = '';
        foreach ($values as $value) {
            $html .= $value->name;
        }
        return $html;
    }
}