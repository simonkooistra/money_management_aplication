@extends('layouts.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user_category.update', $user_category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" required class="form-control" value="{{ old('name', $user_category->name) }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
        <div>
            <a href="{{ route('user_category.index') }}">cancel..</a>
        </div>
    </div>
@endsection