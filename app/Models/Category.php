<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $categories;
    public static function saveCategory($request){
        self::$categories = new Category();
        self::$categories->cat_name = $request->cat_name;
        self::$categories->save();
    }
}
