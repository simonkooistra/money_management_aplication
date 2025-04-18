<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $transactions = auth()->user()->transactions;

        return view(
            'transactions.index',
            ['transactions' => $transactions]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        $savings = auth()->user()->savings;
        return view(
            'transactions.create',
            ['userSavings' => $savings,]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $transaction = new Transaction();

        $transaction->saving_id = $request->input('saving_id');
        $transaction->name = $request->input('name');
        $transaction->make_date = $request->input('make_date');
        $transaction->amount = $request->input('amount');
        auth()->user()->transactions()->save($transaction);

        return redirect()->
        route('transaction.index')->
        with('success', 'transaction successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View|Factory|Application
    {
        if (auth()->id() === $transaction->user_id) {
            return view('transactions.edit')->
            with('succcess', 'transaction successfully edited!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        if (auth()->id() === $transaction->user_id) {
            $transaction->name = $request->input('name');
            $transaction->make_date = $request->input('make_date');
            $transaction->amount = $request->input('amount');
            auth()->user()->transactions()->save($transaction);
        }
        return redirect()->route('transaction.index')->
        with('success', 'transaction successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        if (auth()->id() === $transaction->user_id) {
            $transaction->delete();
        }
        return redirect()->route('transaction.index')->
        with('success', 'transaction successfully destroyed!');

    }
}
