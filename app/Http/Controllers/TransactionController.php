<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use App\Models\UserSaving;
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
        return view('transactions.index', [
            'transactions' => Transaction::all(),
            'saving' => UserSaving::all(),
            'total' => UserSaving::all()->sum('amount')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('transactions.create', ['transaction' => Transaction::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $transaction = new Transaction();

        $transaction->user_id = $request->input('user_id');
        $transaction->saving_id = $request->input('saving_id');
        $transaction->name = $request->input('name');
        $transaction->amount = $request->input('amount');

        auth()->user()->transactions()->save($transaction);

        return to_route('transactions.index', ['transactions']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): View|Factory|Application
    {
        return view('transactions.show', ['transaction' => $transaction]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View|Factory|Application
    {
        return view('transactions.edit', ['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $transaction->user_id = $request->input('user_id');
        $transaction->saving_id = $request->input('saving_id');
        $transaction->name = $request->input('name');
        $transaction->min_amount = $request->input('min_amount');
        $transaction->plus_amount = $request->input('plus_amount');
        $transaction->save();

        return to_route('transactions.index', ['transactions']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();

        return to_route('transactions.index', ['transactions' => Transaction::all()]);
    }
}
