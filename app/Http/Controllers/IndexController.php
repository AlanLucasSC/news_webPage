<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Category;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        return view('index', ['category' => $category]);
    }
}
