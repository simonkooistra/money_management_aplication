@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')

    <table class="transaction">
        <h3>transactions tabels </h3>

        @if ($transactions->isEmpty())
            <p>No transactions yet. make one today!</p>
            <a href="{{route('transaction.create')}}">Add a transaction</a>
        @else
            <tr>
                <th> user_id</th>
                <th> saving nam</th>
                <th> transaction name</th>
                <th>created_add</th>
                <th> amount</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$user_name->name}}</td>
                    <td>{{$saving->name}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->created_add}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td><a href="{{ route('transaction.edit', $transaction->id) }}">Edit</a></td>
                    <td><form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form></td>
                </tr>
            @endforeach
        @endif
    </table>
    <a href="{{ route('transaction.create') }}">Aanmaken</a>
@endsection