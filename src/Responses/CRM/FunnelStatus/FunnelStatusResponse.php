<?php

namespace Weeek\Responses\CRM\FunnelStatus;

use Weeek\Models\CRM\FunnelStatus;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class FunnelStatusResponse extends Response
{
    /**
     * @var FunnelStatus
     */
    public $status;

    protected function getCasts(): array
    {
        return [
            'status' => new AsObject(FunnelStatus::class),
        ];
    }
}
