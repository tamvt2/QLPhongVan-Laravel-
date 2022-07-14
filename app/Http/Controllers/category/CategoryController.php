<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryService $category) {
        $this->category = $category;
    }

    public function create() {
        return view('category.add', [
            'title' => 'Category'
        ]);
    }

    public function index() {
        return view('category.list', [
            'title' => 'List Category',
            'values' => $this->category->getAll()
        ]);
    }

    public function store(Request $request) {
        $this->category->create($request);
        return redirect()->back();
    }

    public function show(Category $category) {
        return view('category.edit', [
            'title' => 'Chỉnh Sửa Category',
            'value' => $category
        ]);
    }

    public function update(Request $request, Category $category) {
        $result = $this->category->update($request, $category);
        if ($result) {
            return redirect('/users/category/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->category->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Category'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa Category thất bại'
        ]);
    }
}
