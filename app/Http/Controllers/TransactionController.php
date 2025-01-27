<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use App\Models\UserCategory;
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
            'transactions' => Transaction::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        $category = UserCategory::where('user_id', auth()->id())->get();

        $savings = UserSaving::where('user_id', auth()->id())->get();

        return view('transactions.create', [
            'userSavings' => $savings,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $transaction = new Transaction();
        /**
         * @todo fix validation
         */
        $transaction->user_id = $request->input('user_id');
        $transaction->saving_id = $request->input('saving_id');
        $transaction->name = $request->input('name');
        $transaction->amount = $request->input('amount');

        auth()->user()->transactions()->save($transaction);

        return to_route('transaction.index');
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
        $transaction->name = $request->input('name');
        $transaction->amount = $request->input('amount');
        auth()->user()->transactions()->save($transaction);

        return to_route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();

        return to_route('transaction.index', ['transactions' => Transaction::all()]);
    }
}
