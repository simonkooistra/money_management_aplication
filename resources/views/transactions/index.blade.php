@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')

    <table class="transaction">
        <h3>transactions tabels </h3>
        <tr>
            <th> user_id</th>
            <th> saving_id</th>
            <th>created_add</th>
            <th> name</th>
            <th> amount</th>
        </tr>
        @foreach($transactions as $transaction)
            <tr>
                <td>{{$transaction->user_id}}</td>
                <td>{{$transaction->saving_id}}</td>
                <td>{{$transaction->name}}</td>
                <td>{{$transaction->created_add}}</td>
                <td>{{$transaction->amount}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
@endsection