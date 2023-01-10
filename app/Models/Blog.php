<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    private static $blog;
    public static function saveBlog($request){
        self::$blog = new Blog();
        self::$blog->category_id        = $request->category_id;
        self::$blog->author_id          = $request->author_id;
        self::$blog->title              = $request->title;
        self::$blog->slug               = self::slug($request);
        self::$blog->description        = $request->description;
        self::$blog->image              = self::getImgUrl($request);
        self::$blog->date               = $request->date;
        self::$blog->blog_type          = $request->blog_type;
        self::$blog->status             = $request->status;
        self::$blog->save();
    }

    public static function getImgUrl($request){

        $image          = $request->file('image');
        $imageName      = rand().'.'.$image->getClientOriginalExtension();
        $directory      = 'adminAsset/upload/blog-image/';
        $imageUrl       = $directory.$imageName;
        $image->move($directory, $imageName);
       return $imageUrl;
    }

    public static function slug($request){

        if($request->slug){
            $str = $request->slug;
            return preg_replace('/\s+/i','-',trim($str));
        }
        $str= $request->title;
        return preg_replace('/\s+/i','-',trim($str));
    }


    public static function updateBlog($request){
        self::$blog = Blog::find($request->blog_id);
        self::$blog->category_id        = $request->category_id;
        self::$blog->author_id          = $request->author_id;
        self::$blog->title              = $request->title;
        self::$blog->slug               = self::slug($request);
        self::$blog->description        = $request->description;
        if($request->file('image')){
            if(self::$blog->image !== null){
                unlink(self::$blog->image);
            }
            self::$blog->image= self::getImgUrl($request);
        }
        self::$blog->date               = $request->date;
        self::$blog->blog_type          = $request->blog_type;
        self::$blog->status             = $request->status;
        self::$blog->save();

    }

    public static function deleteBlog($request){
        self::$blog = Blog::find($request->blog_id);

           if(self::$blog->image){
               if(file_exists(self::$blog->image)){
                   unlink(self::$blog->image);
               }
           }

        self::$blog->delete();
    }

}
