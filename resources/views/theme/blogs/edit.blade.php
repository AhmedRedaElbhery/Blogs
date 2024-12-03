@extends('theme.master')
@section('title','Edit Bolg')
@section('content')
@include('theme.hero',['title' => $blog->name]);

<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if  (Session('blogupdatestatus'))
                <div class="alert alert-success"> {{session('blogupdatestatus')}}
                </div>
                @endif
                <form action="{{ route('blogs.update',['blog' => $blog]) }}" class="form-contact contact_form" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    @method ("PUT");
                    <div class="form-group mb-3 py-2">
                        <input class="form-control border" name="name" id="name" type="text" placeholder="Enter Blog name" value="{{$blog->name}}" />
                       @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror 
                    </div>


                    <div class="form-group mb-3 py-2">
                        <input class="form-control border" name="image" id="image" type="file" />
                       @error('image')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="select-container mb-3">

                        <select class="w-100 py-2" id="category_id" name="category_id">
                            <option value="">Select Option</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $blog->category_id) selected @endif>
                                {{$category->name}}</option>
                            @endforeach
                        </select>
                        @error    ('category_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <textarea class="w-100 border" name="description" rows="6" type="text" placeholder="Enter your description">{{$blog->description}}</textarea>
                        @error('description')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror    
                    </div>


                    <div class="form-group text-center text-md-right my-3">

                        <button type="submit" class="button button--active button-contactForm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ================ contact section end ================= -->

@endsection
