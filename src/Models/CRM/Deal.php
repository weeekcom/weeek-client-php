<?php

namespace Weeek\Models\CRM;

use Weeek\Models\TaskManager\Task;
use Weeek\Models\Workspace\Tag;
use Weeek\Objects\AbstractObject;
use Weeek\Objects\Casts\AsArrayOfObjects;

class Deal extends AbstractObject
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $creatorId;

    /**
     * @var string
     */
    public $funnelId;

    /**
     * @var string
     */
    public $statusId;

    /**
     * @var string|null
     */
    public $executorId;

    /**
     * @var string|null
     */
    public $organizationId;

    /**
     * @var string|null
     */
    public $contactId;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var float|null
     */
    public $amount;

    /**
     * @var string
     */
    public $winStatus;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;

    /**
     * @var array<Tag>
     */
    public $tags;

    /**
     * @var array<Task>
     */
    public $tasks;

    protected function getCasts(): array
    {
        return [
            'tags'  => new AsArrayOfObjects(Tag::class),
            'tasks' => new AsArrayOfObjects(Task::class),
        ];
    }
}
