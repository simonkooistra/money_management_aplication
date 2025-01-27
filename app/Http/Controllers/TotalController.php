<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TotalController extends Controller
{
    /**
     * Display the total page showing savings and categories.
     */
    public function index(): View
    {

        $savings = Auth::user()->savings;
        $categories = Auth::user()->userCategories;

        return view('home', [
            'savings' => $savings,
            'categories' => $categories,
        ]);
    }
}