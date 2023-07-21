<?php

namespace Weeek\Responses\Workspace\Tag;

use Weeek\Models\Workspace\Tag;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class TagListResponse extends ListResponse
{
    /**
     * @var array<Tag>
     */
    public $tags;

    protected function getCasts(): array
    {
        return [
            'tags' => new AsArrayOfObjects(Tag::class),
        ];
    }
}
