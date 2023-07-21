<?php

namespace Weeek\Responses\TaskManager\BoardColumn;

use Weeek\Models\TaskManager\BoardColumn;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class BoardColumnListResponse extends ListResponse
{
    /**
     * @var array<BoardColumn>
     */
    public $boardColumns;

    protected function getCasts(): array
    {
        return [
            'boardColumns' => new AsArrayOfObjects(BoardColumn::class),
        ];
    }
}
