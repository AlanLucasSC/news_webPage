<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Category::all();
        
        return view('index');
    }
}
