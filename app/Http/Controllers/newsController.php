<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;
use App\Category;
use App\News;
use App\File;
use App\News_Files;
use App\User;

class NewsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('markdown', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('markdown', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validation->passes()){
            if(isset($request->title) && isset($request->category) && isset($request->subtitle)){
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $originalName = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $new_name = rand() . '.' . $extension;
                $image->move(public_path('files'), $new_name);

                $image = new File;
                $image->name = $new_name;
                $image->originalName = $originalName;
                $image->type = 'IMAGE';
                $image->save();

                $news = new News;
                $news->user_id = Auth::user()->id;
                $news->category_id = $request->category;
                $news->title = $request->title;
                $news->subtitle = $request->subtitle;
                $news->file_id = $image->id;
                $news->date = date("Y-m-d");
                $news->time = date("H:i:s");
                $news->save();

                return redirect()->route('news.edit', $news->id);
            } else {
                return response()->json([
                    'massage' => 'Faltou inserir informações em algum local.',
                    'class_name' => 'alert-danger'
                ]);
            }
        } 
        
        return response()->json([
            'massage' => $validation->errors()->all(),
            'uploaded_file' => '',
            'class_name' => 'alert-danger'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $news = News::find($id);
        $image = File::find($news->file_id);
        $user = User::find($news->user_id);
        return view('leitura', compact('news', 'image', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLatest($id, $quantity){
        $news = News::all($id)->orderBy('updated_at','desc');
        $latestNews = $news->slice($quantity);
        return view('leitura');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $categories = Category::all();
        $news = News::find($id);
        $image = File::find($news->file_id);
        $news_files = News_Files::where('news_id', $id)->get();
        $files = [];
        foreach($news_files as $news_file){
            $files[] = File::find($news_file->file_id);
        }
        return view('markdown', compact('categories', 'id', 'news', 'image', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $news = News::find($id);
        $validation = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if($validation->passes()){
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $new_name = rand() . '.' . $extension;
            $image->move(public_path('files'), $new_name);

            $image = new File;
            $image->name = $new_name;
            $image->originalName = $originalName;
            $image->type = 'IMAGE';
            $image->save();

            $news->file_id = $image->id;
        }
        $news->category_id = $request->category;
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->text = $request->text;
        $news->save();

        return redirect()->route('news.edit', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $news = News::find($id);
        $news_files = News_Files::where('news_id', $id)->get();

        foreach($news_files as $news_file){
            $news_file->delete();
        }
        $news->delete();

        return redirect()->route('home');
    }

    public function changeStatus($id, $status){
        $news = News::find($id);
        
        if($news->status === 'INACTIVE'){
            $news->status = 'ACTIVE';
        }else{
            $news->status = 'INACTIVE';
        }

        $news->save();

        return redirect()->route('home');
    }
}
