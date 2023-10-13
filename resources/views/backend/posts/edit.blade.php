{{-- resources/views/posts/edit.blade.php --}}

@extends('backend.master')

@section('content')
    <div class="container">
        <h2>Edit Post</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" name="post_title" class="form-control" value="{{ old('post_title', $post->post_title) }}" required>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                  
                    <div class="form-group">
                        <label for="post_number">Post Number</label>
                        <input type="text" name="post_number" class="form-control" value="{{ old('post_number', $post->post_number) }}" required>
                    </div>
                    

                </div>

                <div class="col-md-2">
                    

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>


                <div class="col-md-2">
                    <div class="form-group">
                        <label for="post_home_show">Show on First</label>
                        <select name="post_home_show" class="form-control">
                            <option value="1" {{ old('post_home_show', $post->post_home_show) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('post_home_show', $post->post_home_show) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="post_slide">Slide Show</label>
                        <select name="post_slide" class="form-control">
                            <option value="1" {{ old('post_slide', $post->post_slide) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('post_slide', $post->post_slide) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            
          
            <div class="form-group">
                <label for="post_short_description">Post Short Description</label>
                <textarea name="post_short_description" class="form-control" rows="4" required>{{ old('post_short_description', $post->post_short_description) }}</textarea>
            </div>


            <div class="form-group">
                <label for="post_description">Post  Description</label>
                <textarea name="post_description" class="form-control" id="summernote" rows="4" required>{!!$post->post_description!!}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" name="post_image" class="form-control-file"  type="file"/>
                        {{-- <input type="file" name="post_image" class="form-control-file"> --}}
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
                    <input type="text" name="fb_title" class="form-control" value="{{ old('fb_title', $post->fb_title) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $post->meta_title) }}">
                </div>
            </div>
           </div>
           
           
           <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fb_short_description">Facebook Short Description</label>
                    <textarea name="fb_short_description" class="form-control" rows="4">{{ old('fb_short_description', $post->fb_short_description) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4">{{ old('meta_description', $post->meta_description) }}</textarea>
                </div>
            </div>
           </div>
           

            

            
            
           
           
           
            <div class="form-group">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword', $post->meta_keyword) }}">
            </div>
            <div class="form-group">
                <label for="post_custom_url">Custom URL</label>
                <input type="text" name="post_custom_url" class="form-control" value="{{ old('post_custom_url', $post->post_custom_url) }}">
            </div>
            <div class="form-group">
                <label for="post_custom_code">Custom Code</label>
                <textarea name="post_custom_code" class="form-control" rows="4">{{ old('post_custom_code', $post->post_custom_code) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
