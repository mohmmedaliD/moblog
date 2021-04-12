<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkCat')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home', [
            'blogs' => Blog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create', [
            'pName' => 'create a new blog',
            'cats' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->only(['title', 'desc', 'content', 'category_id']);
        if($request->has('img')) {
            $img = $request->img->store('images', 'public');
            $data['img'] = $img;
        }
        $data['user_id'] = 1;
        Blog::create($data);
        session()->flash('success', 'blog added successfully');
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blogs.blog', [
            'blog' => Blog::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blogs.create', [
            'pName' => 'edit blog',
            'blog' => Blog::find($id),
            'cats' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request,Blog $blog)
    {
        $data = $request->only(['title', 'desc', 'content', 'category_id']);
        if($request->has('img')) {
            $img = $request->img->store('images', 'public');
            Storage::disk('public')->delete($blog->img);
            $data['img'] = $img;
        }
        $blog->tags()->sync($request->tags);
        $blog->update($data);
        session()->flash('success', 'blog updated successfully');
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::withTrashed()->where('id', $id)->first();
        if ($blog->trashed()) {
            if ((str_starts_with($blog->img, 'images'))) {
              Storage::disk('public')->delete($blog->img);
            }
            $blog->tags()->detach();
            $blog->forceDelete();
            session()->flash('success', 'blog deleted successfully');
        } else {
            Blog::destroy($id);
            session()->flash('success', 'blog trashed successfully');
        }
        return redirect(route('home'));
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed ()
    {
        return view('blogs.trashed', [
            'blogs' => Blog::onlyTrashed()->get()
        ]);
    }

    /**
     * restore data.
     *
     * @return \Illuminate\Http\Response
     */
    public function restore ($id)
    {
        $blog = Blog::withTrashed()->where('id', $id)->restore();
        session()->flash('success', 'blog restored successfully');
        return redirect(route('home'));
    }
}
