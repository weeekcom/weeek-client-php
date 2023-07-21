<?php

namespace Weeek\Responses\TaskManager\BoardColumn;

use Weeek\Models\TaskManager\BoardColumn;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class BoardColumnResponse extends Response
{
    /**
     * @var BoardColumn
     */
    public $boardColumn;

    protected function getCasts(): array
    {
        return [
            'boardColumn' => new AsObject(BoardColumn::class),
        ];
    }
}
