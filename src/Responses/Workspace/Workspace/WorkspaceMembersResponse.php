<?php

namespace Weeek\Responses\Workspace\Workspace;

use Weeek\Models\Workspace\WorkspaceMember;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\Response;

class WorkspaceMembersResponse extends Response
{
    /**
     * @var array<WorkspaceMember>
     */
    public $members;

    protected function getCasts(): array
    {
        return [
            'members' => new AsArrayOfObjects(WorkspaceMember::class),
        ];
    }
}
