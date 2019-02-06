<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id', 'desc')->where('status', 'PUBLISHED')->paginate(3);
        //dd($posts);
        return view('web.posts', compact('posts'));
    }
    
    public function category($slug)
    {
        $category = Category::where('slug', $slug)
                  ->pluck('id')
                  ->first();

        $posts = Post::where('category_id', $category)
               ->orderBy('id', 'desc')->where('status', 'PUBLISHED')->paginate(3);
        //dd($posts);
        return view('web.posts', compact('posts'));
    }
    
    public function tag($slug)
    {
        $posts = Post::whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);    
        })
        ->orderBy('id', 'desc')->where('status', 'PUBLISHED')->paginate(3);
        //dd($posts);
        return view('web.posts', compact('posts'));
    }
    
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        //dd($post);
        return view('web.post', compact('post'));
    }

}
