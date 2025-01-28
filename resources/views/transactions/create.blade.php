@extends('layouts.layout')

@section('title', 'Transaction')

@section('content')

    <form action="{{route('transaction.store')}}" method="post">


        @csrf
        <fieldset>
            <legend>Create transaction:</legend>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label for="saving">savings goal</label>
            <select name="saving_id" id="saving">
                @foreach($userSavings as $saving)
                    <option value="{{ $saving->id }}">{{ $saving->name }}</option>
                @endforeach
            </select>

            {{--textfield for the name of the transaction --}}
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" placeholder="name..." required><br>

            <label for="make_date">add a date:</label>
            <input type="date" id="make_date" name="make" placeholder="{{$saving->created_at}}">

            <label for="amount">add a amount:</label>
            <input type="number" id="amount" name="amount" placeholder="amount" required>

            {{--submit button sends form to the controller--}}
            <input type="submit" value="make change"><br><br>

            {{--links back to the index blade of transactions--}}
            <a href="{{ route ("transaction.index") }}">Cancel</a>
        </fieldset>
    </form>

@endsection