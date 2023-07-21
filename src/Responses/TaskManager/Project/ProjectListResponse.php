<?php

namespace Weeek\Responses\TaskManager\Project;

use Weeek\Models\TaskManager\Project;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class ProjectListResponse extends ListResponse
{
    /**
     * @var array<Project>
     */
    public $projects;

    protected function getCasts(): array
    {
        return [
            'projects' => new AsArrayOfObjects(Project::class),
        ];
    }
}
