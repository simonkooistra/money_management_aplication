@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')

    <table class="transaction">
        <h3>{{auth()->user()->name}} transactions table </h3>

            <tr>
                <th>saving name</th>
                <th>transaction name</th>
                <th>created at</th>
                <th>add at</th>
                <th>amount</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->userSaving->name}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->amount}}</td>
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

            @if($transactions->count() === 0)
                <ul>
                    <li>
                        <p>No transaction yet. Start with making transaction now!</p>
                    </li>
                    <li>
                        <a href="{{ route('transaction.create') }}">make first transaction?</a>
                    </li>
                </ul>
            @endif
{{--        @endif--}}
    </table>
    <a href="{{ route('transaction.create') }}">add a transaction?</a>
@endsection