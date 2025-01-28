@extends('layouts.layout')

@section('title', 'Create Saving Goal')

@section('content')
    <div class="container">
        <h1>Create a New Saving Goal</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_saving.store') }}" method="POST">
            @csrf

            <label for="category_id">Category:</label>

            <select name="category_id" id="category_id" required>
                <option value="">-- Select Category --</option>

                @if($categories->isEmpty())
                    <option value="">No categories available</option>
                @else
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                @endif
            </select>


            <label for="name">Saving Goal Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Saving Goal Name..." value="{{ old('name') }}" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" placeholder="Enter a description">{{ old('description') }}</textarea>

            <label for="total_amount">Amount to Save:</label>
            <input type="number" name="total_amount" id="total_amount" placeholder="e.g., 1000" step="0.01" value="{{ old('total_amount') }}" required>

            <button type="submit">Create Saving Goal</button>
        </form>
        <div>
            <a href="{{ route('user_category.index') }}">cancel..</a>
        </div>
    </div>
@endsection