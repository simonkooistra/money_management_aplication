@extends('layouts.layout')

@section('title', 'Create Category')

@section('content')
    <div class="container">
        <h1>Create a New Category</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_category.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" required class="form-control" placeholder="Enter category name...">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection