@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')

    <h3>{{ auth()->user()->name }} transactions table</h3>
    @if($transactions->count() === 0)
        <ul>
            <li>
                <p>No transaction yet. Start with making transaction now!</p>
            </li>
            <li>
                <a href="{{ route('transaction.create') }}">make first transaction?</a>
            </li>
        </ul>
    @else
        <table class="transaction">
            <tr>
                <th>Saving Name</th>
                <th>Transaction Name</th>
                <th>Created At</th>
                <th>
{{--@todo make it work please!?--}}
{{--                    @if($transactions->make_date ==! 0)--}}
{{--                        {{ auth()->user()->name }} add at--}}
{{--                      @endif--}}
                </th>
                <th>Amount</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->userSaving->name}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->make_date}}</td>
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
        </table>

        <a href="{{ route('transaction.create') }}">Create a transaction</a>
    @endif
@endsection