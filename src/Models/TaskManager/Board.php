<?php

namespace Weeek\Models\TaskManager;

use Weeek\Objects\AbstractObject;

class Board extends AbstractObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $projectId;

    /**
     * @var bool
     */
    public $isPrivate;
}
