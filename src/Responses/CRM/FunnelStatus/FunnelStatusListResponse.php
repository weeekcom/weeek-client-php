<?php

namespace Weeek\Responses\CRM\FunnelStatus;

use Weeek\Models\CRM\FunnelStatus;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class FunnelStatusListResponse extends ListResponse
{
    /**
     * @var array<FunnelStatus>
     */
    public $statuses;

    protected function getCasts(): array
    {
        return [
            'statuses' => new AsArrayOfObjects(FunnelStatus::class),
        ];
    }
}
