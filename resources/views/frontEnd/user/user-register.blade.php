@extends('frontEnd.master')
@section('title')
    Register
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Registration</h1>
                    <h6 class="text-success">{{ session('message') }}</h6>
                    <h4 class="page-title"></h4>
                </div>
            </div>


            <div class="form col-md-6 m-auto">
                <form action="{{route('user.register')}}" method="post" role="form" class="php-email-form">
                    @csrf


                        <div class="form-group col-md-12">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" value="{{old('email')}}" required>

                            <span class="text-danger">
                                @error('email')
                                {{$message}}
                                @enderror
                        </span>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone number" value="{{old('phone')}}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="password" placeholder="Your Password" required>

                            <span class="text-danger">
                                @error('password')
                                {{$message}}
                                @enderror
                        </span>
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>

@endsection


