<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\News_Files;
use App\File;

class CategoryController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only(['store','destroy']);
        $this->middleware('auth')->except(['show','index','newsByCategory']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categoryList', compact('categories'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->category;
        $category->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name, $page = 0, Request $request)
    {
        if(isset($request)){
            $page = $request->page - 1;
        }
        $category = Category::find($id);
        switch($name){
            case 'Cultura':
                $category->color = 'success';
                break;
            case 'Mato Grosso do Sul':
                $category->color = 'success';
                break;
            case 'Economia':
                $category->color = 'info';
                break;
            case 'Economia':
                $category->color = 'warning';
                break;
            case 'Esporte':
                $category->color = 'info';
                break;
            case 'Política':
                $category->color = 'danger';
                break;
            default:
                $category->color = 'success';
                break;
        }
        $newsForPage = 6;
        $news_list = News::where('category_id', $id)
                    ->skip($newsForPage * $page)
                    ->take($newsForPage)
                    ->orderBy('created_at', 'desc')
                    ->get();

        foreach($news_list as $news){
            $file = File::find($news->file_id);
            $news->imageName = $file ? $file->name : '';
        }

        $spotlight = News::where('category_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->first();

        $moreViews = News::where('category_id', $id)
                    ->skip(0)
                    ->take(3)
                    ->orderBy('views', 'desc')
                    ->get();
        
        //$pagination = News::where('category_id', $id)->paginate($newsForPage);
        $pagination = News::where('category_id', $id)->paginate($newsForPage);

        return view('categoria', compact('news_list', 'spotlight', 'category', 'moreViews', 'pagination'));   
    }

    /**
     * Display the news of a determined category.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNews($id, $page = 0)
    {
        $categories = Category::find($id)->news();
        return view('categoria', ['categories' => $categories]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $news_list = News::where('category_id', $id)->get();

        foreach($news_list as $news){
            $news_files = News_Files::where('news_id', $news->id)->get();
            foreach($news_files as $news_file){
                $news_file->delete();
            }
            $news->delete();
        }
        $category->delete();
        return redirect()->route('home');
    }
}
