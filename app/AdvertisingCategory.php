<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingCategory extends Model
{
    protected $table = 'advertising_categories';
    public $timestamps = false;
    
    public function news()
    {
        return $this->hasMany('App\Advertising');
    }
}
