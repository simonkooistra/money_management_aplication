@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')

    <h3>{{ auth()->user()->name }} transactions table</h3>

    @if ($transactions->isEmpty())
        <p>No transactions yet. Make one today!</p>
        <a href="{{ route('transaction.create') }}">Add a transaction</a>
    @else
        <table class="transaction">
            <tr>
                <th>Saving Name</th>
                <th>Transaction Name</th>
                <th>Created At</th>
                <th>Amount</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->userSaving->name }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>&#8364;{{ $transaction->amount }}</td>
                    <td><a href="{{ route('transaction.edit', $transaction->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <a href="{{ route('transaction.create') }}">Create a transaction</a>

@endsection