@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')

    <main class="page-content">
        <div class="row">
            <div class="col-lg-12  ">
                <div class="card">

                   <div class="border">
                       <div class="card-body table-responsive-sm">
                           <div class="card-title p-2 rounded">
                               <h3 class="mb-0">Manage Blog</h3>
                           </div>
                           <div class="card-title p-2 rounded">
                               <a href="{{route('add.blog')}}" class="btn btn-success">Add Blog</a>
                           </div>
                           <hr>
                          <table id="example" class="table table-hover table-bordered table-striped" style="width: 100%">
                             <thead>
                                     <tr>
                                         <th>Sl</th>
                                         <th>Category</th>
                                         <th>Author</th>
                                         <th>Title</th>
                                         <th>Slug</th>
                                         <th>Description</th>
                                         <th>Image</th>
                                         <th>Date</th>
                                         <th>Blog Type</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                             </thead>
                              @php $i=1 @endphp
                              @foreach($blogs as $blog)
                             <tbody>
                                     <tr>
                                         <td>{{$i++}}</td>
                                         <td>{{$blog->cat_name}}</td>
                                         <td>{{$blog->author_name}}</td>
                                         <td>{{$blog->title}}</td>
                                         <td>{{$blog->slug}}</td>
                                         <td>{{substr($blog->description,0,50)}}</td>
                                         <td><img src="{{asset($blog->image)}}" alt="" height="50px" width="50px"> </td>
                                         <td>{{$blog->date}}</td>
                                         <td>{{$blog->blog_type}}</td>
                                         <td>{{$blog->status==1 ? 'Published' : 'Unpublished'}}</td>
                                         <td class="d-flex">
                                             <a href="{{route('edit.blog',['id'=>$blog->id])}}" class="btn btn-success btn-sm">Edit</a>&nbsp;
                                             @if($blog->status==1)
                                             <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-warning btn-sm">Unpublished</a>&nbsp;
                                             @else
                                             <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-primary btn-sm">Published</a>&nbsp;
                                             @endif
                                             <form action="{{route('delete.blog')}}" method="post">
                                                 @csrf
                                                 <input type="hidden"  name="blog_id" value="{{$blog->id}}">
                                                 <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                             </form>
                                         </td>
                                     </tr>
                             </tbody>
                              @endforeach
                          </table>
                       </div>
                   </div>

                </div>
            </div>
        </div>

    </main>

@endsection

