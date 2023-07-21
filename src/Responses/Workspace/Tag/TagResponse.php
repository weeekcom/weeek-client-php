<?php

namespace Weeek\Responses\Workspace\Tag;

use Weeek\Models\Workspace\Tag;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\ListResponse;

class TagResponse extends ListResponse
{
    /**
     * @var Tag
     */
    public $tag;

    protected function getCasts(): array
    {
        return [
            'tag' => new AsObject(Tag::class),
        ];
    }
}
