<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;


class BlogPostController extends Controller
{    
    public function index($id)
    {
        $blog = Blog::where('id',$id)->first();
        
        return view('frontend.blog_post',[
            'blog' => $blog
        ]);

    }
}
