@extends('backend.master')



@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
        <table class="table mt-3"  id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key=>$category)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->category_name }}</td>

                   

                    <td> {{ Illuminate\Support\Str::limit($category->category_short_description, 64) }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
