<?php

namespace Weeek\Models\TaskManager;

use Weeek\Objects\AbstractObject;

class TaskWorkload extends AbstractObject
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var int
     */
    public $type;

    /**
     * @var string
     */
    public $date;

    /**
     * @var int
     */
    public $duration;

    /**
     * @var string|null
     */
    public $workStartAt;

    /**
     * @var string|null
     */
    public $workEndAt;
}
