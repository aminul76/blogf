<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class WebsiteSettingsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit()
    {
        $settings = Setting::find(1); // Assuming your settings are stored in a single row in the database
        
        return view('backend.setting', compact('settings'));
    }

    public function update(Request $request)
    {
       
        $settings = Setting::find(1); // Assuming your settings are stored in a single row
    

       
        // Update all attributes
        $settings->update($request->all());
    
        // Handle image uploads
        if ($request->hasFile('website_logo')) {
            $this->uploadImage($request->file('website_logo'), 'website_logo', $settings);
        }
    
        if ($request->hasFile('website_favicon')) {
            $this->uploadImage($request->file('website_favicon'), 'website_favicon', $settings);
        }
    
        if ($request->hasFile('website_banner')) {
            $this->uploadImage($request->file('website_banner'), 'website_banner', $settings);
        }
    
        // Redirect back with a success message
        return redirect()->route('website-settings.edit')->with('success', 'Settings updated successfully.');
    }
    
    // Helper method to upload images
    private function uploadImage($file, $fieldName, $settings)
    {
        try {
            // Check if the file is readable
            if (!$file->isReadable()) {
                throw new \Exception('Uploaded file is not readable.');
            }
    
            $imagePath = $file->store('website-settings', 'public');
    
            // Update the settings with the image path
            $settings->$fieldName = $imagePath;
            $settings->save();
        } catch (\Exception $e) {
            // Log the error or display a more user-friendly error message
            \Log::error('Image upload error: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->route('website-settings.edit')->with('error', 'Image upload error.');
        }
    }

    public function changepassword()
    {
        return view('backend.password');
    }


    public function changepasswordstore(Request $request)
    {
      
      $request->validate([
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => ['required'],
        'new_confirm_password' => ['same:new_password'],
        ]);

    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password),'password_text'=> $request->new_password]);
    return redirect()->route('posts.index');
    }

    
    
    
}
