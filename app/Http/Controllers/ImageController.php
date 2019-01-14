<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Image;

class ImageController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    /**
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
            'newImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validation->passes()){
            $image = $request->file('newImage');
            $originalName = $image->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);

            $image = new Image;
            $image->name = $new_name;
            $image->originalName = $originalName;
            $image->save();

            return response()->json([
                'massage' => 'Image Uploaded Successfully',
                'oriaginal_name' => $originalName,
                'uploaded_image' => $new_name,
                'class_name' => 'alert-danger'
            ]);
        } else {
            return response()->json([
                'massage' => $validation->errors()->all(),
                'uploaded_image' => '',
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
