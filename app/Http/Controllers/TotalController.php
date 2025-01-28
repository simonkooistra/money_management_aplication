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
        $userId = Auth::id();  // Get the authenticated user's ID

        // Transactions for the current month for the authenticated user
        $thisMonth = Transaction::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->sum('amount');

        // Transactions for last month for the authenticated user
        $lastMonth = Transaction::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfMonth()->subMonthsNoOverflow(),
                now()->startOfMonth()->subMonthsNoOverflow()->endOfMonth(),
            ])
            ->sum('amount');

        // Transactions for the current year for the authenticated user
        $thisYear = Transaction::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfYear(),
                now(),
            ])
            ->sum('amount');

        // Transactions for last year for the authenticated user
        $lastYear = Transaction::where('user_id', $userId)
            ->whereBetween('created_at', [
                now()->startOfYear()->subYear(),
                now()->startOfYear(),
            ])
            ->sum('amount');

        // Get the user's savings and categories
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