@extends('layouts.layout')

@section('title', 'My Saving Goals')

@section('content')
    <div class="container">
        <h1>Spaardoelen (Saving Goals)</h1>


        <a href="{{ route('user_saving.create') }}" class="btn">Add New Saving Goal</a>


        @if ($user_savings->isEmpty())
            <p>No saving goals yet. Start one today!</p>
        @else

            <ul>
                @foreach ($user_savings as $goal)
                    <li>
                        <strong>{{ $goal->name }}</strong> - €{{ $goal->total_amount }}
                        <p>{{ $goal->description }}</p>


                        <a href="{{ route('user_saving.edit', $goal->id) }}" class="btn" style="background-color: #ffc107; margin-left: 10px;">Edit</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection