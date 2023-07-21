<?php

namespace Weeek\Responses\Workspace\Workspace;

use Weeek\Models\Workspace\WorkspaceInfo;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class WorkspaceInfoResponse extends Response
{
    /**
     * @var WorkspaceInfo
     */
    public $info;

    protected $transform = ['workspace' => 'info'];

    protected function getCasts(): array
    {
        return [
            'info' => new AsObject(WorkspaceInfo::class),
        ];
    }
}
