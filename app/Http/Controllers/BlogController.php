<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use com;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::get();
            return view("theme.blogs.create", compact('categories'));
        } else {
            return view('theme.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {

        $data = $request->validated();


        //get image

        $image = $request->image;

        //change the name

        $newImageName = time() . '_' . $image->getClientOriginalName();

        //move image to my project

        Storage::disk('public')->putFileAs('blogs', $image, $newImageName);

        //save new name of the image in db

        $data['image'] = $newImageName;

        $data['user_id'] = Auth::user()->id;

        Blog::create($data);

        return back()->with('blogstatus', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view("theme.singleBlog", compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $categories = Category::get();
            return view("theme.blogs.edit", compact('categories', 'blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                //get image
                $image = $request->image;

                //change the name

                $newImageName = time() . '_' . $image->getClientOriginalName();

                //move image to my project

                Storage::disk('public')->putFileAs('blogs', $image, $newImageName);

                //save new name of the image in db

                $data['image'] = $newImageName;

                //delete the old image

                Storage::delete("public/blogs/$blog->image");
            }

            $blog->update($data);

            return back()->with('blogupdatestatus', 'Success');
        }
        abort(403);
    }

    public function myblogs()
    {
        if (Auth::check()) {
            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);
            return view('theme.blogs.myblogs', compact('blogs'));
        }
        abort(403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Storage::delete("public/blogs/$blog->image");
        $blog->delete();
        return back()->with('blogdeletestatus', 'Success');
    }


}
