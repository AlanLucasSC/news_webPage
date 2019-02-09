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
        $newsList = News::where('user_id', Auth::user()->id)
                    ->skip(0)
                    ->take(5)
                    ->orderBy('created_at', 'desc')
                    ->get();
        foreach($newsList as $news){
            $file = File::find($news->file_id);
            $news->nameImage = $file ? $file->name : 'noimage.png';
        }
        return view('dashboard', compact('categories', 'newsList'));   
    }
}
