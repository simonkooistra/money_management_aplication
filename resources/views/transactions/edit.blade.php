@extends('layouts.layout')

@section('title', 'Transaction')

@section('content')
    <div class="container">
        <h1>transaction</h1>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <ul>
                <li>
                    {{$transaction->user_id}}
                </li>
                <li>
                    {{$transaction->saving_id}}
                </li>
            </ul>

            <label for="name">transaction Name:</label>
            <input type="text" name="name" id="name" placeholder="transaction name..."
                   value="{{ $transaction->name }}" required>


            <label for="total_amount">Amount:</label>
            <input type="number" name="amount" id="total_amount" placeholder="e.g., 1000" step="0.01"
                   value="{{ $transaction->amount }}" required>

            <button type="submit">submit</button>
        </form>
    </div>

@endsection