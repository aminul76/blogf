@extends('backend.master')

@section('content')
    <div class="container">
        <h2>Create Plugin</h2>
        <form action="{{ route('plugins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="plugin_name">Plugin Name</label>
                <input type="text" class="form-control" id="plugin_name" name="plugin_name" required>
            </div>

            <div class="form-group">
                <label for="header_code">Header Code</label>
                <textarea class="form-control" id="header_code" name="header_code" ></textarea>
            </div>

            <div class="form-group">
                <label for="body_code">Body Code</label>
                <textarea class="form-control" id="body_code" name="body_code" ></textarea>
            </div>

            <div class="form-group">
                <label>Plugin Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="active" value="1" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="inactive" value="2">
                    <label class="form-check-label" for="inactive">
                        Inactive
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
