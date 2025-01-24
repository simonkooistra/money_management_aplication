@extends('layouts.layout')

@section('title', 'Transaction')

@section('content')
    {{--start of the form with the route trough the controller, with the method post  --}}
    <form action="{{route('transaction.store')}}" method="post">

        {{--securety for sending the form--}}
        @csrf
        <fieldset>
            <legend>Create transaction:</legend>
   {{--shows error message for description if name is not filled in correctly--}}
            @error('name')
            {{ $message }}<br>
            @enderror

            {{--textfield for the description of the game --}}
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" value=""><br>

            <input type="text" id="amount" name="amount" placeholder="amount">

            @foreach($userSavings as $saving)
                {{ $saving->name }}
            @endforeach

            {{--submit button sends form to the controller--}}
            <input type="submit" value="make change"><br><br>

            {{--links back to the index blade of games--}}
            <a href="{{ route ("transaction.index") }}">Cancel</a>
        </fieldset>
    </form>

@endsection