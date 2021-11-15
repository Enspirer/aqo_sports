<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;


class BlogPostController extends Controller
{    

    public function allPosts($category)
    {
        if($category == 'news') {

            $posts = Blog::where('category', 'News')->where('status', 'Enabled')->get();
            $title = 'All Trending News';
        
            return view('frontend.posts',[
                'posts' => $posts,
                'title' => $title
            ]);
        }

        else {

            $posts = Blog::where('category', 'Blog')->where('status', 'Enabled')->get();
            $title = 'All Blogs';
        
            return view('frontend.posts',[
                'posts' => $posts,
                'title' => $title
            ]);
        }
        

    }


    public function index($id)
    {
        $blog = Blog::where('id',$id)->first();
        
        return view('frontend.blog_post',[
            'blog' => $blog
        ]);

    }
}
