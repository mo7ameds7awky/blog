<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count() == 0) {
            Session::flash('info', 'You have must created categories beafore creating posts!');

            return redirect()->route('categories.create');
        }

        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required|max:500',
            'post_image' => 'required|image',
            'category_id' => 'required'
        ]);

        $_post_image = $request->post_image;

        $_post_image_name = time() . $_post_image->getClientOriginalName();

        $_post_image->move('uploads/posts/', $_post_image_name);

        $post_image_path = 'uploads/posts/' . $_post_image_name;

        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = str_slug($request->title);
        $post->post_image = $post_image_path;
        $post->category_id = $request->category_id;
        
        $post->save();

        Session::flash('success', 'Post has been created successfully');

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.posts.show')->with('post', Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.posts.edit')->with('post', Post::find($id))->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required|max:500',
            'post_image' => 'image',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured')) {

            $_post_image = $request->post_image;

            $_post_image_name = time() . $_post_image->getClientOriginalName();

            $_post_image->move('uploads/posts/', $_post_image_name);

            $post_image_path = 'uploads/posts/' . $_post_image_name;

            $post->post_image = $post_image_path;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        
        $post->save();

        Session::flash('success', 'Category has been updated successfully');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', "The post has been permenentally deleted successfully");

        return redirect()->route('posts');
    }

    public function trash($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', "The post has been trashed successfully");

        return redirect()->back();
    }

    public function trashedIndex()
    {
        return view('admin.posts.trashedIndex')->with('trashedPosts', Post::onlyTrashed()->get());
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', "The post has been restored successfully");

        return redirect()->route('posts');
    }
}
