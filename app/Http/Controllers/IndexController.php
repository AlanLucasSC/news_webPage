<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Catalog;
class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        foreach($categories as $category){
            switch($category->name){
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
        }
        $catalog = Catalog::all();
        if(!isset($catalog)){
            $catalog = $catalog->random(3);
        }else{
            $catalog = [];
        }
        
        return view('index',compact('categories','catalog'));
    }
}
