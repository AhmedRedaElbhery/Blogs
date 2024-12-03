@extends('theme.master')
@section('title','My Bolgs')
@section('content')
@include('theme.hero',['title' => 'My Bolgs']);

<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if  (Session('blogdeletestatus'))
                <div class="alert alert-success"> {{session('blogdeletestatus')}}
                </div>
                @endif
                <table class="table mb-5">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>

                            <td><a target="_blank" href="{{route('blogs.show',['blog' => $blog])}}">{{$blog->name}} </a></td>
                            <td class="w-25">
                                <a href="{{route('blogs.edit',[ 'blog' => $blog])}}" class="btn btn-primary text-light m-1"> Edit </a>

                                <form class="d-inline" id="delete_form" action="{{route('blogs.destroy' , ['blog' => $blog ] )}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <a href="javascript:$('form#delete_form').submit();" class="btn btn-danger text-light"> Delete </a>
                                </form>
                            </td>

                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ================ contact section end ================= -->
    @endsection
