@extends('backend.master')

@section('content')
    <div class="container">
        <h2>Plugin List</h2>
        <a href="{{ route('plugins.create') }}" class="btn btn-primary mb-3">Create Plugin</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Plugin Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plugins as $plugin)
                    <tr>
                        <td>{{ $plugin->id }}</td>
                        <td>{{ $plugin->plugin_name }}</td>
                        <td>@if($plugin->status==1)
                            Active
                        
                            @else
                            Inactive
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('plugins.edit', $plugin->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('plugins.destroy', $plugin->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this plugin?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
