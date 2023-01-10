@extends('frontEnd.master')
@section('title')
    Log In
@endsection
@section('content')
    <section id="contact" class="contact mb-5">

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Login</h1>
                </div>
            </div>


            <div class="form col-md-6 m-auto">
                <form action="{{route('user.login')}}" method="post" role="form" class="php-email-form">
                    @csrf
                    <h5 class="text-danger">{{ session('message') }}</h5>
                    <div class="form-group col-md-12">
                        <input type="text" name="user_name" class="form-control" id="" placeholder="Your Username" required>
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="Your Password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div><!-- End Contact Form -->
        </div>

    </section>

@endsection



