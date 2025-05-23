@extends('layouts.layout')

@section('title', 'Total Page')

@section('content')
    <h1>Total Page</h1>

    <h2>Your Savings</h2>
    <ul>
        @forelse ($savings as $saving)
            <li>
                <strong>{{ $saving->name }}</strong>: &#8364;{{ $saving->total_amount }} {{ $saving->currency ?? '' }} -
                Already saved: &#8364; {{ $saving->transactions->sum('amount') }}
                <p>{{ $saving->description }}</p>
            </li>
        @empty
            <li>You have no savings yet.</li>
        @endforelse
    </ul>

    <h2>Your Categories</h2>
    <ul>
        @forelse ($categories as $category)
            <li>{{ $category->name }}</li>
        @empty
            <li>You have no categories yet.</li>
        @endforelse
    </ul>

    <h2>Stats</h2>
    <ul>
        <li><strong>This Month:</strong> &#8364;{{ $thisMonth }}</li>
        <li><strong>Last Month:</strong> &#8364;{{ $lastMonth }}</li>
        <li><strong>This Year:</strong> &#8364;{{ $thisYear }}</li>
        <li><strong>Last Year:</strong> &#8364;{{ $lastYear }}</li>
    </ul>

@endsection