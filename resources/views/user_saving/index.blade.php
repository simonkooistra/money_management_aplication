@extends('layouts.layout')

@section('title', 'My Saving Goals')

@section('content')
    <div class="container">
        @if($user_categories->isEmpty())
            <h2>categories</h2>
            <p> no categories created yet.
            to create a saving goal, you first have to create a category.
            please click the link below to create a category.</p>
            <a href="{{route('user_category.create')}}" class="btn">click to create category</a>
        @endif




        <h2>Saving Goals</h2>


        <a href="{{ route('user_saving.create') }}" class="btn">add a New saving goal</a>
            {{--@todo: look add class="btn"change if necessary: because its ugly. --}}

        @if ($user_savings->isEmpty())
            <p>No saving goals yet. Start one today!</p>
        @else
{{--            @todo: change $goal to $saving--}}
{{--        @todo: change CSS to compete the overall feel and look of page--}}
            <ul>
                @foreach ($user_savings as $goal)
                    <li>                                     {{-- shows the sum of saving and transaction--}}
                        <strong>{{ $goal->name }}</strong> - €{{ $goal->total_amount }}
                        <p>{{ $goal->description }}</p>
                        <p>total of the saving: {{ $goal->transactions->sum('amount') }}</p>
                        <p>total of transactions: {{ $goal->transactions->count() }}</p>

                        <a href="{{ route('user_saving.edit', $goal->id) }}" class="btn">Edit</a>
                        <form action="{{ route('user_saving.destroy', $goal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this saving goal?')">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection