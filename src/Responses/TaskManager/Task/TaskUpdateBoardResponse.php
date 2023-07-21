<?php

namespace Weeek\Responses\TaskManager\Task;

use Weeek\Responses\Response;

class TaskUpdateBoardResponse extends Response
{
    /**
     * @var int|null
     */
    public $boardId;

    /**
     * @var int|null
     */
    public $boardColumnId;
}
