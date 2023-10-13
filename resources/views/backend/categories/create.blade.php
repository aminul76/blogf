@extends('backend.master')



@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Create Category</h2>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

           
           <div class="col-md-4">
            
        <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
        </div>

          
            <div class="col-md-4">
            <div class="form-group">
                <label for="category_number">Category Number</label>
                <input type="text" class="form-control" id="category_number" name="category_url" required>
            </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="category_number">Category Url</label>
                    <input type="number" class="form-control" id="category_number" name="category_number" >
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                <label>Category Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_status" id="active" value="1" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="category_status" id="inactive" value="0">
                    <label class="form-check-label" for="inactive">
                        Inactive
                    </label>
                </div>
            </div>
            </div>



            <div class="col-md-4">
                <div class="form-group">
                <label>Category Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="header_show" id="active" value="1" checked>
                    <label class="form-check-label" for="active">
                        Header Show
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="header_show" id="inactive" value="0">
                    <label class="form-check-label" for="inactive">
                        Header Not  Show
                    </label>
                </div>
            </div>

            </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="category_short_description">Short Description</label>
                <textarea class="form-control" id="category_short_description" name="category_short_description"></textarea>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="category_description">Description</label>
                <textarea class="form-control" id="category_description" name="category_description"></textarea>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            </div>
            <div class="col-md-4">
        <div class="form-group">
                <label for="fb_share_image">Facebook Share Image</label>
                <input type="file" class="form-control-file" id="fb_share_image" name="fb_share_image">
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="fb_title">Facebook Title</label>
                <input type="text" class="form-control" id="fb_title" name="fb_title">
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="fb_short_description">Facebook Short Description</label>
                <textarea class="form-control" id="fb_short_description" name="fb_short_description"></textarea>
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title">
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description"></textarea>
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea class="form-control" id="meta_keywords" name="meta_keywords"></textarea>
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="image_title">Image Title</label>
                <input type="text" class="form-control" id="image_title" name="image_title">
            </div></div>
            <div class="col-md-4">
    <div class="form-group">
                <label for="custom_code">Custom Code</label>
                <textarea class="form-control" id="custom_code" name="custom_code"></textarea>
            </div>

        </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
