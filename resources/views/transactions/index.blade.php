@extends('layouts.layout')

@section('title', 'Transactions')

@section('content')
    {{$saving}}
{{$saving->sum('total_amount')}}
@endsection