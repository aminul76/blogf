
@extends('backend.master') {{-- Assuming you have a layout file --}}

@section('content')
    <div class="container">
        <form action="{{ route('website-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="website_name">Website Name</label>
                <input type="text" class="form-control" id="website_name" name="website_name" value="{{ $settings->website_name }}">
            </div>
            
            <div class="form-group">
                <label for="website_title">Website Title</label>
                <input type="text" class="form-control" id="website_title" name="website_title" value="{{ $settings->website_title }}">
            </div>

            <div class="form-group">
                <label for="website_short_description">Website Short Description</label>
                <textarea class="form-control" id="website_short_description" name="website_short_description">{{ $settings->website_short_description }}</textarea>
            </div>

              <div class="form-group">
                <label for="website_email">website_email</label>
                <textarea class="form-control" id="website_email" name="website_email">{{ $settings->website_email }}</textarea>
            </div>

            

            <div class="form-group">
                <label for="website_logo">Website Logo</label>
                <input type="file" class="form-control-file" id="website_logo" name="website_logo">
            </div>

            <div class="form-group">
                <label for="website_favicon">Website Favicon</label>
                <input type="file" class="form-control-file" id="website_favicon" name="website_favicon">
            </div>

            <div class="form-group">
                <label for="website_fb">Facebook URL</label>
                <input type="text" class="form-control" id="website_fb" name="website_fb" value="{{ $settings->website_fb }}">
            </div>

            <div class="form-group">
                <label for="website_wp">WhatsApp URL</label>
                <input type="text" class="form-control" id="website_wp" name="website_wp" value="{{ $settings->website_wp }}">
            </div>

            <div class="form-group">
                <label for="website_yt">YouTube URL</label>
                <input type="text" class="form-control" id="website_yt" name="website_yt" value="{{ $settings->website_yt }}">
            </div>

            <div class="form-group">
                <label for="website_tw">Twitter URL</label>
                <input type="text" class="form-control" id="website_tw" name="website_tw" value="{{ $settings->website_tw }}">
            </div>

            <div class="form-group">
                <label for="website_ln">LinkedIn URL</label>
                <input type="text" class="form-control" id="website_ln" name="website_ln" value="{{ $settings->website_ln }}">
            </div>

            <div class="form-group">
                <label for="website_phone_number">Phone Number</label>
                <input type="text" class="form-control" id="website_phone_number" name="website_phone_number" value="{{ $settings->website_phone_number }}">
            </div>

            <div class="form-group">
                <label for="website_address">Address</label>
                <input type="text" class="form-control" id="website_address" name="website_address" value="{{ $settings->website_address }}">
            </div>

            <div class="form-group">
                <label for="website_banner">Website Banner</label>
                <input type="file" class="form-control-file" id="website_banner" name="website_banner">
            </div>

            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $settings->meta_title }}">
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description">{{ $settings->meta_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="meta_keyword">Meta Keyword</label>
                <input id="tags" type="text" class="form-control" name="meta_keyword" value="{{ $settings->meta_keyword }}" placeholder="Enter tags separated by commas">
            </div>
            
         

            <div class="form-group">
                <label for="logo_title">Logo Title</label>
                <input type="text" class="form-control" id="logo_title" name="logo_title" value="{{ $settings->logo_title }}">
            </div>

            <div class="form-group">
                <label for="banner_title">Banner Title</label>
                <input type="text" class="form-control" id="banner_title" name="banner_title" value="{{ $settings->banner_title }}">
            </div>

            <div class="form-group">
                <label for="header_custom_code">Header Custom Code</label>
                <textarea class="form-control" id="header_custom_code" name="header_custom_code">{{ $settings->header_custom_code }}</textarea>
            </div>

            <div class="form-group">
                <label for="body_custom_code">Body Custom Code</label>
                <textarea class="form-control" id="body_custom_code" name="body_custom_code">{{ $settings->body_custom_code }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
@endsection
