@extends('layouts.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <form action="{{ route('user_category.update', $user_category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" required class="form-control" value="{{ old('name', $user_category->name) }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection