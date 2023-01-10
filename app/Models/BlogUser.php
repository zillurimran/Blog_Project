<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    use HasFactory;
    public static $user;
    public static function saveUser($request){

        $request->validate([
            'email'=> 'required|email|unique:blog_users',
            'password'=> 'required|min:6'
         ],
         [
            'email.unique'=>'This email is already exists, Please try another one'
        ]);

       self::$user          = new BlogUser();
       self::$user->name    = $request->name;
       self::$user->email   = $request->email;
       self::$user->phone   = $request->phone;
       self::$user->password = bcrypt($request->password);
       self::$user->save();
    }
}
