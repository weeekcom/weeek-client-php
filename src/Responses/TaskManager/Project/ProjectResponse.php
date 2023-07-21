<?php

namespace Weeek\Responses\TaskManager\Project;

use Weeek\Models\TaskManager\Project;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class ProjectResponse extends Response
{
    /**
     * @var Project
     */
    public $project;

    protected function getCasts(): array
    {
        return [
            'project' => new AsObject(Project::class),
        ];
    }
}
