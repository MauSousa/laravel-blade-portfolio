<?php

declare(strict_types=1);

namespace App\Actions\Projects;

use App\Models\Project;

class CreateProject
{
    /**
     * Create a new project.
     *
     * @param  array<string, mixed>  $data
     **/
    public function handle($data): Project
    {
        return Project::create([
            'is_published' => true,
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'technologies' => $data['technologies'] ?? null,
            'repository_url' => $data['repository_url'] ?? null,
            'project_url' => $data['project_url'] ?? null,
            'features' => $data['features'] ?? null,
        ]);
    }
}
