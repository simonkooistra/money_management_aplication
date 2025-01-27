<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{
    /**
     * Display the total page showing savings and categories.
     */
    public function index(): View
    {
        $thisMonth = Transaction::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->sum('amount');


        $lastMonth = Transaction::whereBetween('created_at', [
            now()->startOfMonth()->subMonthsNoOverflow(),
            now()->startOfMonth()->subMonthsNoOverflow()->endOfMonth(),
        ])->sum('amount');


        $thisYear = Transaction::whereBetween('created_at', [
            now()->startOfYear(),
            now(),
        ])->sum('amount');


        $lastYear = Transaction::whereBetween('created_at', [
            now()->startOfYear()->subYear(),
            now()->startOfYear(),
        ])->sum('amount');



        $savings = Auth::user()->savings;
        $categories = Auth::user()->userCategories;

        return view('home', [
            'savings' => $savings,
            'categories' => $categories,
            'thisMonth' => $thisMonth,
            'lastMonth' => $lastMonth,
            'thisYear' => $thisYear,
            'lastYear' => $lastYear,

        ]);
    }
}