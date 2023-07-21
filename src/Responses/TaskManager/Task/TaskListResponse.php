<?php

namespace Weeek\Responses\TaskManager\Task;

use Weeek\Models\TaskManager\Task;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class TaskListResponse extends ListResponse
{
    /**
     * @var array<Task>
     */
    public $tasks;

    protected function getCasts(): array
    {
        return [
            'tasks' => new AsArrayOfObjects(Task::class),
        ];
    }
}
