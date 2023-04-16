<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $postsByGroup = Post::where('status', 1)->get()->groupBy('category_id');

        $latestPosts = Post::where('status', 1)->orderBy('id', 'desc')->limit(9)->get();
        $readMore = Post::inRandomOrder()->where('status', 1)->limit(15)->get();

//        dd($readMore);

        return view("frontend.home", compact(
            'postsByGroup',
            'categories',
            'latestPosts',
            'readMore',
        ));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function show($slug)
    {
        $allCategory = Category::where('status', 1)->get();
        $post = Post::where('slug', $slug)->where('status', 1)->first();
        if ($post) {
            $inThisCategory = Post::where('category_id', $post->category_id)->get();
            return view('frontend.single', compact('post', 'inThisCategory', 'allCategory'));
        } else {
            return "page not found";
        }
    }

    public function postUsingCategory($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        if ($category) {
            $posts = Post::where('status', 1)->where('category_id', $category->id)->orderBy('id', 'desc')->get();
            return view('frontend.category', compact('posts'));
        } else {
            return "page not found";
        }
    }

    public function tags($tags)
    {
        $posts = Post::where('status', 1)->where('tags','like','%tags%')->get();
        if ($posts) {
            return view('frontend.tags', compact('posts'));
        } else {
            return "page not found";
        }
    }
}
