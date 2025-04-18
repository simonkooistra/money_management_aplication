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
        $user_categories = auth()->user()->usercategories;
        return view(
            'user_category.index',
            ['user_categories' => $user_categories]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        $user_categories = auth()->user()->usercategories;
        return view(
            'user_category.create',
            ['user_categories' => $user_categories]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCategoryRequest $request): RedirectResponse
    {
        $user_categories = new UserCategory();
        $user_categories->name = $request->input('name');
        auth()->user()->usercategories()->save($user_categories);

        return redirect()->
        route('user_category.index')->
        with('success', 'category successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCategory $user_category): View|Factory|Application
    {
        if (auth()->id() === $user_category->user_id) {
            return view('user_category.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCategoryRequest $request, UserCategory $user_category): RedirectResponse
    {
        if (auth()->id() === $user_category->user_id) {
            $user_category->name = $request->input('name');
            auth()->user()->userCategories()->save($user_category);
        }
        return redirect()->
        route('user_category.index')->
        with('success', 'category successfully edited!');
    }

    /**
     * @todo make delete work again
     * Remove the specified resource from storage.
     */
    public function destroy(UserCategory $user_category): RedirectResponse
    {
        if (auth()->id() === $user_category->user_id) {
            $user_category->delete();
        }

        return redirect()->route('user_category.index')->
        with('success', 'category successfully destroyed!');
    }
}
