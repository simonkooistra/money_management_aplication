<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCategoryRequest;
use App\Http\Requests\UpdateUserCategoryRequest;
use App\Models\UserCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        return view('user_category.index', ['user_categories' => UserCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('user_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCategoryRequest $request): RedirectResponse
    {
        $user_category = new UserCategory();
        $user_category->user_id = auth()->id();
        $user_category->name = $request->input('name');
        auth()->user()->userCategories()->save($user_category);

        return redirect()->route('user_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCategory $user_category): View|Factory|Application
    {
        return view('user_category.index', ['user_categories' => $user_category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCategory $user_category): View|Factory|Application
    {
        return view('user_category.index', ['user_categories' => $user_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCategoryRequest $request, UserCategory $user_category): RedirectResponse
    {
        $user_category->user_id = $request->input('user_id');
        $user_category->name = $request->input('name');
        auth()->user()->userCategories()->save($user_category);

        return to_route('user_category.index', ['user_categories' => UserCategory::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCategory $user_category): RedirectResponse
    {
        $user_category->delete();
        return to_route('user_category.index', ['user_categories' => UserCategory::all()]);
    }
}
