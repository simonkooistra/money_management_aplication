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


        <form action="{{ route('user_saving.update', $user_savings->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="category_id">Category:</label>
            <input type="text" name="category_id" id="category_id" placeholder="Enter category ID..." value="{{ $user_savings->category_id }}" required>

            <label for="name">Saving Goal Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Saving Goal Name..." value="{{ $user_savings->name }}" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" placeholder="Enter a description">{{ $user_savings->description }}</textarea>

            <label for="total_amount">Amount to Save:</label>
            <input type="number" name="total_amount" id="total_amount" placeholder="e.g., 1000" step="0.01" value="{{ $user_savings->total_amount }}" required>

            <button type="submit">Update Saving Goal</button>
        </form>
    </div>
@endsection