{{-- resources/views/posts/index.blade.php --}}
@extends('backend.master')
@section('content')
    <div class="container">
        <h2>Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table" id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{Illuminate\Support\Str::limit($post->post_title, 40)}}</td>
                        <td>{{ $post->category->category_name }}</td>                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
