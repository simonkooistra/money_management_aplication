<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSavingRequest;
use App\Http\Requests\UpdateUserSavingRequest;
use App\Models\Transaction;
use App\Models\UserCategory;
use App\Models\UserSaving;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserSavingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {

        $user_savings = UserSaving::where('user-id', auth()->id())->get();
        return view('user_saving.index', ['user_savings' => $user_savings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        $categories = auth()->user()->userCategories;
        $category = UserCategory::where('user_id', auth()->id())->get();

        if ($categories->isEmpty()) {
            dd('No categories found.');
        }


        return view('user_saving.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserSavingRequest $request): RedirectResponse
    {
        $user_savings = new UserSaving();

        $user_savings->category_id = $request->input('category_id');
        $user_savings->name = $request->input('name');
        $user_savings->description = $request->input('description');
        $user_savings->total_amount = $request->input('total_amount');
        auth()->user()->savings()->save($user_savings);

        return to_route('user_saving.index', ['user_savings']);
    }

    /**
     * Display the specified resource.
     */
    public function show(): View|Factory|Application
    {
        return view('user_saving.index', ['user_saving' => UserSaving::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserSaving $user_saving): View|Factory|Application
    {
        if ($user_saving->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }


        return view('user_saving.edit', ['user_saving' => $user_saving]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserSavingRequest $request, UserSaving $user_savings): RedirectResponse
    {
//
        $user_savings->category_id = $request->input('category_id');
        $user_savings->name = $request->input('name');
        $user_savings->description = $request->input('description');
        $user_savings->total_amount = $request->input('total_amount');
        $user_savings->save();

        return to_route('user_saving.index', ['user_savings']);
    }

    /**
     * @todo make delete work again
     * Remove the specified resource from storage.
     */

    public function destroy(UserSaving $user_saving): Factory|Application|View
    {
        if (auth()->id() === $user_saving->user_id) {
            $user_saving->delete();

        }
        return view('user_saving.index', ['user_savings' => UserSaving::all()]);
    }
}
