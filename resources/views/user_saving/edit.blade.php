@extends('layouts.layout')

@section('title', 'Edit Saving Goal')

@section('content')
    <div class="container">
        <h1>Edit Saving Goal</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user_saving.update', $user_saving->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Select Category --</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                            {{ $user_saving->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="name">Saving Goal Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Saving Goal Name..." value="{{ $user_saving->name }}" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" placeholder="Enter a description">{{ $user_saving->description }}</textarea>

            <label for="total_amount">Amount to Save:</label>
            <input type="number" name="total_amount" id="total_amount" placeholder="e.g., 1000" step="0.01" value="{{ $user_saving->total_amount }}" required>

            <button type="submit">Update Saving Goal</button>
        </form>
    </div>
@endsection
