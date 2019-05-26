<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome')->with('title', Setting::first()->site_name)
                              ->with('categories', Category::take(4)->get())
                              ->with('latest_post', Post::orderBy('created_at', 'desc')->first())
                              ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                              ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                              ->with('categoriesPosts', Category::orderBy('created_at', 'desc')->take(3)->get())
                              ->with('settings', Setting::first());
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');

        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('singlePost')->with('post', $post)
                                 ->with('title', $post->title)
                                 ->with('categories', Category::take(4)->get())
                                 ->with('settings', Setting::first())
                                 ->with('next', Post::find($next_id))
                                 ->with('prev', Post::find($prev_id))
                                 ->with('tags', Tag::all());
    }

    public function categoryPosts($id)
    {
        $category = Category::find($id);

        return view('category')->with('category', $category)
                                 ->with('settings', Setting::first())
                                 ->with('categories', Category::take(4)->get())
                                 ->with('posts', $category->posts)
                                 ->with('tags', Tag::all());
    }

    public function tagsPosts($id)
    {
        $tag = Tag::find($id);

        return view('tags')->with('tag', $tag)
                                 ->with('settings', Setting::first())
                                 ->with('categories', Category::take(4)->get())
                                 ->with('posts', $tag->posts)
                                 ->with('tags', Tag::all());
    }
}
