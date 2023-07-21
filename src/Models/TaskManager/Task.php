<?php

namespace Weeek\Models\TaskManager;

use Weeek\Objects\AbstractObject;
use Weeek\Objects\Casts\AsArrayOfObjects;

class Task extends AbstractObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int|null
     */
    public $parentId;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string|null
     */
    public $date;

    /**
     * @var string|null
     */
    public $time;

    /**
     * @var int|null
     */
    public $duration;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int|null
     */
    public $priority;

    /**
     * @var bool
     */
    public $isCompleted;

    /**
     * @var string
     */
    public $authorId;

    /**
     * @var string|null
     */
    public $userId;

    /**
     * @var int|null
     */
    public $boardId;

    /**
     * @var int|null
     */
    public $boardColumnId;

    /**
     * @var int|null
     */
    public $projectId;

    /**
     * @var string|null
     */
    public $image;

    /**
     * @var bool
     */
    public $isPrivate;

    /**
     * @var string|null
     */
    public $dateStart;

    /**
     * @var string|null
     */
    public $dateEnd;

    /**
     * @var string|null
     */
    public $timeStart;

    /**
     * @var string|null
     */
    public $timeEnd;

    /**
     * @var array<int>
     */
    public $tags = [];

    /**
     * @var array<string>
     */
    public $subscribers = [];

    /**
     * @var array<TaskWorkload>
     */
    public $workloads = [];

    protected function getCasts(): array
    {
        return [
            'workloads' => new AsArrayOfObjects(TaskWorkload::class),
        ];
    }
}
