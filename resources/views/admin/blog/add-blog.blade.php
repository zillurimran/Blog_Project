@extends('admin.master')
@section('title')
     Blog
@endsection
@section('content')

    <main class="page-content">
        <div class="row">
            <div class="col-md-8 offset-md-2 ">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title p-2 rounded">
                            <h3 class="mb-0">Add Blog</h3>
                        </div>
                        <hr>
                        <form action="{{route('new.blog')}}" method="post" enctype="multipart/form-data">
                            @csrf

                           <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Category</label>
                               <div class="col-sm-9">

                                   <select name="category_id" class="form-control">
                                       @foreach($categories as $category)
                                       <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Author</label>
                               <div class="col-sm-9">
                                   <select name="author_id" class="form-control">
                                      @foreach($authors as $author)
                                       <option value="{{$author->id}}">{{$author->author_name}}</option>
                                       @endforeach

                                   </select>
                               </div>
                           </div>
                            <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Title</label>
                               <div class="col-sm-9">
                                   <input type="text" name="title" class="form-control">
                               </div>
                           </div>
                            <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Slug</label>
                               <div class="col-sm-9">
                                   <input type="text" name="slug" class="form-control">
                               </div>
                           </div>
                            <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Description</label>
                               <div class="col-sm-9">
                                   <textarea name="description" class="form-control"></textarea>
                               </div>
                           </div>
                            <div class="row mb-3">
                               <label for="category_id" class="col-sm-3 col-form-label">Image</label>
                               <div class="col-sm-9">
                                   <input type="file" name="image" class="form-control">
                               </div>
                           </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" class="form-control">
                                        <option value="trending">Trending</option>
                                        <option value="popular">Popular</option>
                                        <option value="latest">Latest</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="status" value="1">Published
                                    <input type="radio" name="status" value="0">Unpublished

                                </div>
                            </div>





                            <div class="row mb-3">
                                <label  class="col-sm-3 col-form-label"></label>
                               <div class="col-sm-9">
                                   <input type="submit"  class="btn btn-primary px-5">
                               </div>
                           </div>



                        </form>
                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection

