@extends('backend.master')

@section('content')
    <div class="container">
        <h2>Edit Plugin</h2>
        <form action="{{ route('plugins.update', $plugin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="plugin_name">Plugin Name</label>
                <input type="text" class="form-control" id="plugin_name" name="plugin_name" value="{{ $plugin->plugin_name }}" required>
            </div>

            <div class="form-group">
                <label for="header_code">Header Code</label>
                <textarea class="form-control" id="header_code" name="header_code">{{ $plugin->header_code }}</textarea>
            </div>

            <div class="form-group">
                <label for="body_code">Body Code</label>
                <textarea class="form-control" id="body_code" name="body_code">{{ $plugin->body_code }}</textarea>
            </div>

            <div class="form-group">
                <label>Plugin Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="active" value="1" {{ $plugin->status === '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="inactive" value="2" {{ $plugin->status === '2' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inactive">
                        Inactive
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
