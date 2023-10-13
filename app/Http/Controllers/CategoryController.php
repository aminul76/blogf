<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Category;
Use Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    private function uploadImage($request, $fieldName, $category)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imagePath = $image->store('category_images', 'public');

            // Resize and save the image using Intervention Image
            $image = Image::make(storage_path("app/public/{$imagePath}"))
                ->fit(800, 600) // Adjust dimensions as needed
                ->save();

            return $imagePath;
        }
        return null;
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'user_id' => 'integer',
            'category_number' => 'required|integer',
            'category_status' => 'required|integer',
            'category_short_description' => 'nullable',
            'category_description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size
            'fb_share_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size
            'fb_title' => 'nullable|max:255',
            'fb_short_description' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'image_title' => 'nullable|max:255',
            'custom_code' => 'nullable',
            'header_show' => 'nullable',
            'category_url' => 'required|string|max:255|unique:categories',

        ]);


    
        $category = Category::create($validatedData);

        // Handle file uploads
        $category->image = $this->uploadImage($request, 'image', $category);

        $category->fb_share_image = $this->uploadImage($request, 'fb_share_image', $category);

        // Handle file uploads for other fields
        // ...

        $category->user_id = auth()->user()->id;

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
    
        
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'user_id' => 'integer',
            'category_number' => 'required|integer',
            'category_status' => 'required|integer',
            'category_short_description' => 'nullable',
            'category_description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size
            'fb_share_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size
            'fb_title' => 'nullable|max:255',
            'fb_short_description' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'image_title' => 'nullable|max:255',
            'custom_code' => 'nullable',
            'header_show' => 'nullable',
            'category_url' => 'required|string|max:255',

        ]);
    
        // Check if an image file is uploaded and update the image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            
            // Upload and update the new image
            $category->image = $this->uploadImage($request, 'image', $category);
        }
    
        // Check if an fb_share_image file is uploaded and update the fb_share_image
        if ($request->hasFile('fb_share_image')) {
            // Delete the old fb_share_image if it exists
            if ($category->fb_share_image) {
                Storage::disk('public')->delete($category->fb_share_image);
            }
            
            // Upload and update the new fb_share_image
            $category->fb_share_image = $this->uploadImage($request, 'fb_share_image', $category);
        }
    
        // Update other fields
        $category->update($validatedData);
    
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Delete image files if applicable
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        if ($category->fb_share_image) {
            Storage::disk('public')->delete($category->fb_share_image);
        }
        // Delete other image files if applicable
        // ...

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}


