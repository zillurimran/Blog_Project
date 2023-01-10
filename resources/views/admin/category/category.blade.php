@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')

       <main class="page-content">
           <div class="row">
               <div class="col-md-8 offset-md-2 ">
                   <div class="card">

                       <div class="card-body">
                           <div class="card-title p-2 rounded">
                               <h3 class="mb-0">Add Category</h3>
                           </div>
                           <hr>
                           <form action="{{route('new.category')}}" method="post">
                               @csrf

                               <input type="text" name="cat_name" class="form-control" placeholder="enter category name">

                               <input type="submit" class="btn btn-success mt-lg-5 w-100">
                           </form>
                       </div>

                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-md-8 offset-md-2 ">
                   <div class="card">

                       <div class="card-body">
                           <div class="card-title p-2 rounded">
                               <h3 class="mb-0">Mange Category</h3>
                           </div>
                           <hr>
                          <table class="table table-striped table-bordered table-hover">
                              <tr>
                                  <th>Sl</th>
                                  <th>Category Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              @php $i=1 @endphp
                              @foreach($categories as $category)
                              <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$category->cat_name}}</td>
                                  <td>{{$category->status==1 ? 'Published':'Unpublished'}}</td>
                                  <td>
                                      <a href="" class="btn btn-primary">Edit</a>
                                      <a href="" class="btn btn-danger">Delete</a>
                                  </td>
                              </tr>
                              @endforeach
                          </table>
                       </div>

                   </div>
               </div>
           </div>
    </main>

@endsection
