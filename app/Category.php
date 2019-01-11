<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    
    public function news()
    {
        return $this->hasMany('App\News');
    }
}
