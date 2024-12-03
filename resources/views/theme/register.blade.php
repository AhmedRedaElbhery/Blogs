@extends('theme.master')
@section('title','register')
@section('class','active')
@section('content')
@include('theme.hero',['title' => 'register']);
<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('register_post') }}" class="form-contact contact_form" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control border" name="name" id="name" type="text" placeholder="Enter your name" value="{{old('name')}}" />
                                @error('name')
                                   <div class="text-danger mt-2">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" value="{{old('email')}}" />
                                @error('email')
                                   <div class="text-danger mt-2">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password" />
                                 @error('password')
                                   <div class="text-danger mt-2">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation" />
                                 @error('password_confirmation')
                                   <div class="text-danger mt-2">{{ $message }}</div>
                                 @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center text-md-right mt-3">
                        <a href="{{route('login') }}" class="button--active button-contactForm mr-3">Have Account</a>
                        <button type="submit" class="button button--active button-contactForm">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </>
    <!-- ================ contact section end ================= -->

    @endsection
