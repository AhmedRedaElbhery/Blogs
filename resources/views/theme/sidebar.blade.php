<?php

$categories = App\Models\Category::get();
$recentblogs = App\Models\Blog::latest()->take(3)->get();

?>

<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                <div class="col-autos">
                    @if(Session('status'))
                    <div class="alert alert-success"> {{session('status')}}
                    </div>
                    @endif
                    <form method="post" action="{{route('subscribe_store')}}">
                        @csrf
                        <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'" value="{{old('email')}}" />

                        @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="bbtns d-block mt-20 w-100 mt-2">Subcribe</button>
                    </form>

                </div>
            </div>

        </div>

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach($categories as $category )
                <li>
                    <a href="{{route('theme.category',['id' => $category->id])}}" class="d-flex justify-content-between">
                        <p>{{$category->name}}</p>
                        <p>({{count($category->blogs)}})</p>
                    </a>
                </li>

                @endforeach
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Blogs</h4>
            <div class="popular-post-list">
                @foreach($recentblogs as $blog)
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{asset('storage')}}/blogs/{{$blog->image}}" alt="" />
                        <ul class="thumb-info">
                            <li><a href="#">{{$blog->user->name}}</a></li>
                            <li><a href="#">{{$blog->created_at}}</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{route('blogs.show',['blog' => $blog])}}">
                            <h6>{{$blog->name}}</h6>
                        </a>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
