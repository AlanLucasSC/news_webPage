<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\News;

class NewsViewsController extends Controller
{
    public function plusView(Request $request){
        $news = News::find($request->id);
        $news->views += 1;

        $news->save();

        return 'Plus View OK';
    }
}
