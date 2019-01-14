<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class MarkdownController extends Controller
{
    public function markdownToHtml(Request $request){
        return Markdown::convertToHtml($request->markdown);
    }
}
