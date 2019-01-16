<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\News;
use App\File;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::all();
        $newsList = News::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        foreach($newsList as $news){
            $news->nameImage = File::find($news->file_id)->name;
        }
        return view('dashboard', compact('categories', 'newsList'));   
    }
}
