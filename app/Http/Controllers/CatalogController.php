<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Catalog;
use App\File;

use Validator;

class CatalogController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $catalog = Catalog::all();
        return view('catalog', ['catalog' => $catalog]);
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
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = null;

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
        }

        $catalog = new Catalog;
        $catalog->name = $request->name;
        $catalog->url = $request->url;
        $catalog->description = $request->description;
        $catalog->contact = $request->contact;
        $catalog->user_id = Auth::user()->id;

        if( isset($image) ){
            $catalog->file_id = $image->id;
        }

        $catalog->save();

        $catalog = Catalog::all();
        return view('catalog' , compact('catalog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalog::all();
        $ad = Catalog::find($id);
        return view('catalog', ['ad' => $ad , 'catalog' => $catalog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();
        return redirect()->route('catalog.create');

    }
}
