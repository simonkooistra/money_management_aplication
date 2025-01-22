@extends('layouts.layout')

@section('title', 'User Categories')

@section('content')
    <div class="container">
        <h1>Your Categories</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('user_category.create') }}" class="btn btn-primary">Create New Category</a>

        @if ($user_categories->isEmpty())
            <p>No categories found. Start by creating one!</p>
        @else
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user_categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('user_category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('user_category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection