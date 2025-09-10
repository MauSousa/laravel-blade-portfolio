<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Projects\CreateProject;
use App\Http\Requests\Projects\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard', [
            'projects' => Project::query()->latest()->simplePaginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request, CreateProject $action): RedirectResponse
    {
        $action->handle($request->validated());

        return to_route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): void
    {
        dd('showing...', $project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): void
    {
        dd('editing...', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project): void
    {
        dd('updating...', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): void
    {
        dd('deleting...', $project);
    }
}
