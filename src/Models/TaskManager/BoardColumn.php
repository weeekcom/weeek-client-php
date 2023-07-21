<?php

namespace Weeek\Models\TaskManager;

use Weeek\Objects\AbstractObject;

class BoardColumn extends AbstractObject
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
    public $boardId;
}
