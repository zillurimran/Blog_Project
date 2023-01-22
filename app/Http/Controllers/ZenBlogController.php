<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Category;
use Illuminate\Http\Request;



use DB;
use Session;

class ZenBlogController extends Controller
{
    public function index(){

        return view('frontEnd.home.home',[
            'blogs'=> DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.cat_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('blog_type','popular')
            ->orderby('id','desc')
//            ->skip(1)
            ->take(3)
            ->get()
        ]);
    }

    public function blog($slug){

        $blogs= DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.cat_name','authors.author_name')
            ->where('slug',$slug)
            ->first();

        $catId = $blogs->category_id;
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.cat_name','authors.author_name')
            ->where('category_id',$catId)
            ->get();

        $comments = DB::table('comments')
            ->join('blog_users','comments.user_id','blog_users.id')
            ->select('comments.*','blog_users.name')
            ->where('comments.blog_id',$blogs->id)
            ->get();

        return view('frontEnd.blog.blog-details',[
            'blog'=> $blogs,
            'categoryWiseBlogs'=>$categoryWiseBlogs,
            'comments'=>$comments
        ]);
    }

    public function about(){
        return view('frontEnd.about.about');
    }


    public function contact(){
        return view('frontEnd.contact.contact');
    }


    public function category($id){

        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.cat_name','authors.author_name')
            ->where('blogs.category_id',$id)
            ->get();
        $categories = Category::where('id',$id)->first();

        return view('frontEnd.categories.category',[
                'categoryWiseBlogs'=>$categoryWiseBlogs,
                'category'=>$categories
        ]);
    }

    public function userRegister(){
        return view('frontEnd.user.user-register');
    }

    public function saveUser(Request $request){
        BlogUser::saveUser($request);
        return back()->with('message','Successfully Registered. Please login with your username and password to continue');
    }

    public function userLogin(){
        return view('frontEnd.user.user-login');
    }

    public function checkLogin(Request $request){

       $userInfo = BlogUser::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();

        if($userInfo){
            $existingPassword = $userInfo->password;
            if(password_verify($request->password, $existingPassword)){
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect(route('home'));
            }else{

                return back()->with('message','Please use correct password');
            }
               }else{
                return back()->with('message','Please use valid username');
        }
    }

    public function logout(){
        Session::forget('userId');
        Session::forget('userName');
        return redirect(route('home'));
    }

    public function apiBlogDetails($id){
        $blogs= DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.cat_name','authors.author_name')
            ->where('blogs.id',$id)
            ->first();
        return json_encode($blogs);
    }

}
