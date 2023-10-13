{{-- resources/views/posts/create.blade.php --}}

@extends('backend.master')

@section('content')
    <div class="container">
        <h2>Create Post</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" class="form-control" required>
            </div>


            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="post_number">Post Number</label>
                        <input type="text" name="post_number" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="post_home_show">First Home</label>
                        <select name="post_home_show" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="post_slide">Slide</label>
                        <select name="post_slide" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
            </div>





           
            <div class="form-group">
                <label for="post_short_description">Post Short Description</label>
                <textarea name="post_short_description" class="form-control" rows="4" required></textarea>
            </div>


            <div class="form-group">
                <label for="post_description">Post  Description</label>
                <textarea name="post_description" class="form-control" id="summernote" rows="4" required></textarea>
            </div>

         

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" name="post_image" class="form-control-file" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fb_image">Facebook Image</label>
                        <input type="file" name="fb_image" class="form-control-file">
                    </div>
                </div>
            </div>

            
          
           
           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fb_title">Facebook Title</label>
                            <input type="text" name="fb_title" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fb_short_description">Facebook Short Description</label>
                            <textarea name="fb_short_description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>

           


           
           
            
            
           
            <div class="form-group">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="text" name="meta_keyword" class="form-control">
            </div>
            <div class="form-group">
                <label for="post_custom_url">Custom URL</label>
                <input type="text" name="post_custom_url" class="form-control">
            </div>
            <div class="form-group">
                <label for="post_custom_code">Custom Code</label>
                <textarea name="post_custom_code" class="form-control" rows="4"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
