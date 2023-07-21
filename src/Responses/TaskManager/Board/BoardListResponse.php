<?php

namespace Weeek\Responses\TaskManager\Board;

use Weeek\Models\TaskManager\Board;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class BoardListResponse extends ListResponse
{
    /**
     * @var array<Board>
     */
    public $boards;

    protected function getCasts(): array
    {
        return [
            'boards' => new AsArrayOfObjects(Board::class),
        ];
    }
}
