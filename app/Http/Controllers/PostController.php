<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    //new item
    //seond item
    public function index()
    {
        $posts = Post::all();
        return view('backend.posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        // Show form to create a new post
        return view('backend.posts.create',compact('categories'));
    }

    
public function store(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'post_title' => 'required|string|max:255',
        'post_number' => 'nullable|integer', // Assuming post_number is unique
        'post_short_description' => 'required|string',
        'post_description' => 'required',

        'post_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'integer',
        'post_position' => 'nullable|integer',
        'status' => 'required|boolean',
        

        'post_home_show' => 'required|boolean',
        'post_slide' => 'required|boolean',
        'fb_title' => 'nullable|string|max:255',
        'fb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'fb_short_description' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keyword' => 'nullable|string|max:255',
        'post_custom_url' => 'required|string|max:255|unique:posts',
        'post_custom_code' => 'nullable|string',
    ]);

    // Handle image uploads with Intervention Image
    $postImage = $request->file('post_image');
    $postImageFileName = time() . '_' . $postImage->getClientOriginalName();
    $postImage = Image::make($postImage)->fit(800, 600)->encode('jpg', 80);
    Storage::disk('public')->put('post_images/' . $postImageFileName, $postImage);

    $fbImage = null;
    if ($request->hasFile('fb_image')) {
        $fbImage = $request->file('fb_image');
        $fbImageFileName = time() . '_fb_' . $fbImage->getClientOriginalName();
        $fbImage = Image::make($fbImage)->fit(1200, 630)->encode('jpg', 80);
        Storage::disk('public')->put('fb_images/' . $fbImageFileName, $fbImage);
    }

    // Create the post
    $post = new Post($validatedData);
    $post->post_image = 'post_images/' . $postImageFileName;
    $post->fb_image = $fbImage ? 'fb_images/' . $fbImageFileName : null;
    $post->user_id = auth()->user()->id;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
}


public function edit($id)
{
    $post = Post::findOrFail($id);
    $categories = Category::all();
  

    return view('backend.posts.edit', compact('post', 'categories'));
}

public function update(Request $request, $id)
{
    // Validate input
   
    $validatedData = $request->validate([
        'post_title' => 'required|string|max:255',
        'post_number' => 'nullable|integer',
        'post_short_description' => 'required|string',
        'post_description' => 'required',
        'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'category_id' => 'required|exists:categories,id',
        'user_id' => 'integer',
        'post_position' => 'nullable|integer',
        'status' => 'required|boolean',
        'post_home_show' => 'required|boolean',
        'post_slide' => 'required|boolean',
        'fb_title' => 'nullable|string|max:255',
        'fb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'fb_short_description' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keyword' => 'nullable|string|max:255',
        'post_custom_url' => 'nullable|string|max:255',
        'post_custom_code' => 'nullable|string',
        'post_custom_url' => 'required|string|max:255',

        
    ]);

    // Find the post by ID
    $post = Post::findOrFail($id);

   

    // Handle image uploads with Intervention Image
    if ($request->hasFile('post_image')) {
        // Delete the old post image if it exists
        if ($post->post_image) {
            Storage::disk('public')->delete($post->post_image);
        }

        // Upload and process the new post image
        $postImage = $request->file('post_image');
        $postImageFileName = time() . '_' . $postImage->getClientOriginalName();
        $postImage = Image::make($postImage)->fit(800, 600)->encode('jpg', 80);
        Storage::disk('public')->put('post_images/' . $postImageFileName, $postImage);

        // Update the post image field in the database
        $post->post_image = 'post_images/' . $postImageFileName;
    }

    if ($request->hasFile('fb_image')) {
        // Delete the old Facebook image if it exists
        if ($post->fb_image) {
            Storage::disk('public')->delete($post->fb_image);
        }

        // Upload and process the new Facebook image
        $fbImage = $request->file('fb_image');
        $fbImageFileName = time() . '_fb_' . $fbImage->getClientOriginalName();
        $fbImage = Image::make($fbImage)->fit(1200, 630)->encode('jpg', 80);
        Storage::disk('public')->put('fb_images/' . $fbImageFileName, $fbImage);

        // Update the Facebook image field in the database
        $post->fb_image = 'fb_images/' . $fbImageFileName;
    }

    // Update other post attributes with the validated data
    $post->fill($validatedData);

    // Save the updated post
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully');
}


public function destroy($id)
{
    $post = Post::findOrFail($id);

    // Delete associated images from storage
    if ($post->post_image) {
        Storage::disk('public')->delete($post->post_image);
    }

    if ($post->fb_image) {
        Storage::disk('public')->delete($post->fb_image);
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
}



}
