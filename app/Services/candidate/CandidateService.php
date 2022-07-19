<?php

namespace App\Services\candidate;

use App\Models\Candidate;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CandidateService {
    
    public function getCate() {
        return Category::select('id', 'category')->get();
    }

    public function create($request) {
        try {
            Candidate::create([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'category_id' => $request->input('category_id'),
                'experince' => $request->input('experince'),
                'interview_date' => $request->input('interview_date')
            ]);

            Session::flash('success', 'Thêm Ứng Viên Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm Ứng Viên thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Candidate::orderBy('id', 'asc')->paginate(15);
    }

    public static function get($id) : string {
        $values = Category::select('category')->where('id', $id)->get();
        $html = '';
        foreach ($values as $value) {
            $html .= $value->category;
        }
        return $html;
    }

    public function update($request, $candidate) {
        try {
            $candidate->fill(['name' => $request->input('name'),
                            'age' => $request->input('age'),
                            'phone' => $request->input('phone'),
                            'address' => $request->input('address'),
                            'category_id' => $request->input('category_id'),
                            'experince' => $request->input('experince'),
                            'interview_date' => $request->input('interview_date')
                        ]);
            $candidate->save();
            Session::flash('success', 'Cập nhật Ứng Viên thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật Ứng Viên thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Candidate::where('id', $id)->first();
        if ($value) {
            return Candidate::where('id', $id)->delete();
        }
        return false;
    }

    public function getList() {
        return Candidate::orderBy('interview_date', 'asc')->paginate(15);
    }

    public static function getName($id) {
        $values = Candidate::select('name')->where('id', $id)->get();
        $html = '';
        foreach ($values as $value) {
            $html .= $value->name;
        }
        return $html;
    }

    public static function getNameCate($id) {
        $values = Candidate::select('category_id')->where('id', $id)->get();
        $category_id = '';
        foreach ($values as $value) {
            $category_id .= $value->category_id;
        }
        return CandidateService::get($category_id);
    }
}