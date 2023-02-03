<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // public function posts(){
    //     return $this->hasMany('App\Models\Post');
    // }
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
