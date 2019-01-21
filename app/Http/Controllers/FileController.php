<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\File;
use App\News_Files;

class FileController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:jornalista')->except(['show','index']);
        $this->middleware('auth')->except(['show','index']);
    }

    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validation = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,png,jpg,gif,mp4|max:2048',
        ]);
        if($validation->passes()){
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $new_name = rand() . '.' . $extension;
            $file->move(public_path('files'), $new_name);

            $videoExtensions = array("mp4"); 
            if(in_array($extension, $videoExtensions)){
                $type = 'VIDEO';
            }else{
                $type = 'IMAGE';
            }

            $file = new File;
            $file->name = $new_name;
            $file->originalName = $originalName;
            $file->type = $type;
            $file->save();

            $news_files = new News_Files;
            $news_files->news_id = $request->newsId;
            $news_files->file_id = $file->id;
            $news_files->save();

            return response()->json([
                'message' => 'File Uploaded Successfully',
                'oriaginal_name' => $originalName,
                'uploaded_file' => $new_name,
                'class_name' => 'alert-danger',
                'type' => $type
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_file' => '',
                'class_name' => 'alert-danger'
            ]);
        }
        return 'OK';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
