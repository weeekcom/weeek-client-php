<?php

namespace Weeek\Responses\TaskManager\Task;

use Weeek\Models\TaskManager\Task;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class TaskResponse extends Response
{
    /**
     * @var Task
     */
    public $task;

    protected function getCasts(): array
    {
        return [
            'task' => new AsObject(Task::class),
        ];
    }
}
