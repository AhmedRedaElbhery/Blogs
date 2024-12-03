@extends('theme.master')
@section('title','login')
@section('class','active')
@section('content')
@include('theme.hero',['title' => 'login']);
<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('login')}}" class="form-contact contact_form" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" value="{{old('email')}}" />
                        @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password" />
                        @error('password')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <a href="{{route('register') }}" class="button--active button-contactForm mr-3"> Sign Up</a>
                        <button type="submit" class="button button--active button-contactForm">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection
