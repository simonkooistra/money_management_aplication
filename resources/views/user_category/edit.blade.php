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
            <div>
                <button type="submit" onclick="return confirm(`are you sure you want to change: {{old('name',$user_category->name)}} to: {{$user_category->name}}?`)" class="btn-category-delete">update</button>
                <a href="{{route('user_category.index')}}" onclick="return confirm(`are you sure you want to cancel on: {{old('name',$user_category->name)}}?`)" class="btn-category-delete">cancel</a>
            </div>
        </form>
    </div>
@endsection