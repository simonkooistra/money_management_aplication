@extends('layouts.layout')

@section('title', 'Transaction')

@section('content')
    {{--start of the form with the route trough the controller, with the method post  --}}
    <form action="{{route('games.store')}}" method="post">

        {{--securety for sending the form--}}
        @csrf
        <fieldset>
            <legend>Create transaction:</legend>

            {{--option to select the right category_id for the newly created game--}}
            <label for="transaction">transaction:</label><br>

            <select id="transaction" name="new_transaction">

                @foreach($transactions as $transaction)

                    {{-- under water category_id value-- name is shown in browser--}}
                    <option value="{{$transaction->id}}">{{$transaction->name}}</option>
                @endforeach
            </select>
            <br><br>


            {{--shows error message for name if name is not filled in correctly --}}
            @error('saving_id')
            {{ $message }}<br>
            @enderror

            {{--textfield for title game--}}
            <label for="saving_id">saving_id:</label><br>
            <input type="number" id="saving_id" name="saving_id" value=" "><br><br>

            {{--shows error message for description if description is not filled in correctly--}}
            @error('name')
            {{ $message }}<br>
            @enderror

            {{--textfield for the description of the game --}}
            <label for="name">name:</label><br>
            <textarea id="name" name="name" rows="4" cols="50"></textarea><br>


            <p>Check if category is active</p>

            {{--        shows error message for is_active if is_active is not filled in correctly--}}
            @error('active')
            {{ $message }}<br>
            @enderror

            {{--gives value 1 if checked or "active" --}}
            <input type="radio" id="is_active" name="active" value="1">
            <label for="is_active">Is Active</label><br><br>

            {{--        gives value 0 if checked or "not active"--}}
            <input type="radio" id="not_active" name="active" value="0">
            <label for="not_active">Not Active</label><br><br>

            {{--submit button sends form to the controller--}}
            <input type="submit" value="make change"><br><br>

            {{--links back to the index blade of games--}}
            <a href="{{ route ("games.index") }}">Cancel</a>
        </fieldset>
    </form>

@endsection