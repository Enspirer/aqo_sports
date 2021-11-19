<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\NewspageMultipleAd;


class BlogPostController extends Controller
{    

    public function allPosts($category)
    {
        if($category == 'news') {

            $posts = Blog::where('category', 'News')->where('status', 'Enabled')->get();
            $title = 'All Trending News';

            $nleft = NewspageMultipleAd::where('position','nleft')->first();
            $nright = NewspageMultipleAd::where('position','nright')->first();
            $nmiddle_top = NewspageMultipleAd::where('position','nmiddle_top')->first();
            $nmiddle_bottom = NewspageMultipleAd::where('position','nmiddle_bottom')->first();
        
            return view('frontend.posts',[
                'posts' => $posts,
                'title' => $title,
                'nleft' => $nleft,
                'nright' => $nright,
                'nmiddle_top' => $nmiddle_top,
                'nmiddle_bottom' => $nmiddle_bottom
            ]);
        }

        else {

            $posts = Blog::where('category', 'Blog')->where('status', 'Enabled')->get();
            $title = 'All Blogs';

            $nleft = NewspageMultipleAd::where('position','left')->first();
            $nright = NewspageMultipleAd::where('position','right')->first();
            $nmiddle_top = NewspageMultipleAd::where('position','middle_top')->first();
            $nmiddle_bottom = NewspageMultipleAd::where('position','middle_bottom')->first();
        
            return view('frontend.posts',[
                'posts' => $posts,
                'title' => $title,
                'nleft' => $nleft,
                'nright' => $nright,
                'nmiddle_top' => $nmiddle_top,
                'nmiddle_bottom' => $nmiddle_bottom
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
