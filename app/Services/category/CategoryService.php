<?php

namespace App\Services\category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoryService {
    public function create($request) {
        try {
            Category::create($request->input());

            Session::flash('success', 'Tạo Category Thanh Công');
        } catch (\Exception $e) {
            Session::flash('error', 'Tạo Category thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Category::orderBy('id' , 'asc')->paginate(15);
    }

    public function show($request) {
        $id = $request->input('id');
        return Category::where('id', $id)->first();
    }

    public function update($request, $category) {
        try {
            $category->fill(['category' => $request->input('category')]);
            $category->save();
            Session::flash('success', 'Cập nhật Category thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật Category thất bại');
            Log::info($e->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request) {
        $id = $request->input('id');
        $value = Category::where('id', $id)->first();
        if ($value) {
            return Category::where('id', $id)->delete();
        }
        return false;
    }
}