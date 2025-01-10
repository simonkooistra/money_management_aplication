<?php

namespace App\Http\Controllers;

use App\Models\UserCategory;
use App\Http\Requests\StoreUserCategoryRequest;
use App\Http\Requests\UpdateUserCategoryRequest;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user_category.index', ['user_categories' => UserCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCategoryRequest $request)
    {
        $usercategory = new UserCategory();
        $usercategory->name = $request->name;
        $usercategory->save();

        return to_route('/user_category.index', ['user_categories' => UserCategory::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCategory $userCategory)
    {
        return view('user_category.index', ['user_categories' => $userCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserCategory $userCategory)
    {
        return view('user_category.index', ['user_categories' => $userCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCategoryRequest $request, UserCategory $userCategory)
    {



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCategory $userCategory)
    {
        //
    }
}
