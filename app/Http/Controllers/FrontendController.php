<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;

class FrontendController extends Controller
{
    public function index()
    {

                $slide_posts = Post::where('status', 1)
                ->where('post_slide', 1)
                ->orderBy('post_number', 'asc')
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get();

                  $home_posts = Post::where('status', 1)
                  ->where('post_slide', 0)
                  ->where('post_home_show', 1)
                  ->orderBy('post_number', 'asc')
                  ->orderBy('id', 'desc')
                  ->limit(1)
                  ->get();

                  $posts = Post::where('status', 1)
                  ->where('post_slide', 0)
                  ->where('post_home_show', 0)
                  ->orderBy('post_number', 'asc')
                  ->orderBy('id', 'desc')
                  ->paginate(6);
                  $siteSetting=Setting::first();

                  
        // Pass the retrieved posts to a view and return the view
        return view('frontend.index',compact('slide_posts','home_posts','posts','siteSetting'));
    }
     

    public function details($post_custom_url)
    {
       


        $postCount = Post::where('post_custom_url', $post_custom_url)
                            ->where('status', 1)
                            ->count();
        
       



       
        $siteSetting=Setting::first();

        
       
        if ($postCount == 1 ) {

            $post=Post::where('post_custom_url',$post_custom_url)
            ->where('status', 1)
    
            ->first();
            return view('frontend.details', compact('post'));
        }

        elseif($postCount == 0){

            
          
            $categoryCount = Category::where('category_url', $post_custom_url)
            ->where('category_status', 1)
            ->get()
            ->count();

        if ( $categoryCount==1) {

            $category = Category::where('category_url', $post_custom_url)->where('category_status', 1)->firstOrFail();
            $posts = Post::where('category_id', $category->id)->where('status', 1)->paginate(10);
            return view('frontend.categorypost',compact('posts','siteSetting','category'));

        }
        else {
            return redirect()->back();
        }
            
       

       
        }

        else {
          return redirect()->back();
        }
        
       
    }

    public function blogs()
    {
        $posts = Post::where('status', 1)
                  ->orderBy('post_number', 'asc')
                  ->orderBy('id', 'desc')
                  ->paginate(10);
                  $siteSetting=Setting::first();
           
        return view('frontend.allblogs',compact('posts','siteSetting'));
    }


    public function categoriesdetails($category_url)
    {
        $category = Category::where('category_url', $category_url)->where('category_status', 1)->firstOrFail();
        
        // Get the posts associated with the category
        $posts = Post::where('category_id', $category->id)->where('status', 1)->paginate(2);


        
        $siteSetting=Setting::first();
        return view('frontend.categorypost',compact('posts','siteSetting','category'));

     

    }
    
}
