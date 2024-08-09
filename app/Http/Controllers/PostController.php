<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', [
            'categories' => $categories
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'string|max:255|unique:posts',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = $attributes['slug'] ?? $attributes['title'];

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('images/posts');
        }

        if ($request->hasFile('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('images/posts/thumbnails');
        }

        $post = Post::create($attributes);

        // default category
        $category = Category::first();

        // attach category to pivot table
        $post->categories()->attach($category);
        
        // if fail
        if(!$post) {
            dd('fail');
            return redirect()->back()->with('error', 'Failed to create post');
        }

        // return json
        return response()->json([
            'message' => 'Post created successfully',
            'data' => $attributes
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        
        return view('admin.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
