<?php

namespace Weeek\Responses\TaskManager\Board;

use Weeek\Models\TaskManager\Board;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class BoardResponse extends Response
{
    /**
     * @var Board
     */
    public $board;

    protected function getCasts(): array
    {
        return [
            'board' => new AsObject(Board::class),
        ];
    }
}
