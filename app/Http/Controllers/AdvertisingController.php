<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Advertising;
use App\File;
use App\AdvertisingCategory;
use Validator;

class AdvertisingController extends Controller
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
        $ads = Advertising::all();
        $categories = AdvertisingCategory::all();
        return view('advertising', compact('categories', 'ads'));
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
        if( isset( $request->image ) ){
            if(isset($request->url)){
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
                //return dd($request->image);
                
                $advertising = new Advertising;
                $advertising->file_id = $image->id;
                $advertising->category_id = $request->category;
                $advertising->url = $request->url;
                $advertising->save();

                return redirect()->back()->with('message', 'Criado com sucesso!');
            } else{
                return response()->json([
                    'message' => 'É preciso colocar uma URL',
                    'class_name' => 'alert-danger'
                ]);
            }
        } 
        return response()->json([
            'message' => 'É preciso colocar uma imagem',
            'class_name' => 'alert-danger'
        ]);
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
    public function destroy($id){
        $advertising = Advertising::find($id);
        $advertising_file = File::find($advertising->file_id);
        unlink(public_path('files').'\\'.$advertising_file->name);
        $advertising->delete();
        $advertising_file->delete();

        return redirect()->back()->with('message', 'Excluido com sucesso');
    }
}
