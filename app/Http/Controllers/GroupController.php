<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        return view('groups.index', ['groups' => Group::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request): RedirectResponse
    {
        $group = new Group();

        $group->name = $request->input('name');
        $group->group_img = $request->input('group_img');
        $group->description = $request->input('description');
        $group->save();

        return to_route('groups.index', ['groups']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group): View|Factory|Application
    {
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group): View|Factory|Application
    {
        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group): RedirectResponse
    {
        $group->name = $request->input('name');
        $group->group_img = $request->input('group_img');
        $group->description = $request->input('description');
        $group->total_amount = $request->input('total_amount');
        $group->save();

        return to_route('groups.index', ['groups']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): View|Factory|Application
    {
        $group->delete();

        return view('groups.index', ['groups']);
    }
}
