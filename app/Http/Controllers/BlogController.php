<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.add-blog',[
            'categories'=>Category::all(),
            'authors'=>Author::all()
        ]);
    }

    public function saveBlog(Request $request){
        
        Blog::saveBlog($request);
            return redirect(route('manage.blog'));
    }

    public function manageBlog(){
        return view('admin.blog.manage-blog',[
            'blogs'=>DB::table('blogs')
                    ->join('categories','blogs.category_id','categories.id')
                    ->join('authors','blogs.author_id','authors.id')
                    ->select('blogs.*','categories.cat_name','authors.author_name')
                    ->get()
        ]);
    }

   public function editBlog($id){

        return view('admin.blog.edit-blog',[
            'blog' => Blog::find($id),
            'categories'=>Category::all(),
            'authors'=>Author::all()
        ]);
   }

   public function updateBlog(Request $request){
        Blog::updateBlog($request);
        return redirect(route('manage.blog'));
   }

   public function deleteBlog(Request $request){

        Blog::deleteBlog($request);
        return redirect(route('manage.blog'));
   }

   public function status($id){
            $blog = Blog::find($id);
            if($blog->status == 1){
                $blog->status =2;
            }else{
                $blog->status=1;
            }
            $blog->save();
            return redirect(route('manage.blog'));
   }
}
