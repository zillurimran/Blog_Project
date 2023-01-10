<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\HttpFoundation\Session\Storage\save;

class Author extends Model
{
    use HasFactory;
    public static $author;
    public static function saveAuthor($request){
       self::$author = new Author();
        self::$author->author_name = $request->author_name;
        self::$author->save();
    }
}
