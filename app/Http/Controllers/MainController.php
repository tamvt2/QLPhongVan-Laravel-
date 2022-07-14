<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('layout.home', [
            'title' => 'quản lí phỏng vấn'
        ]);
    }
}
