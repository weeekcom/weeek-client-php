<?php

namespace Weeek\Responses\CRM\Funnel;

use Weeek\Models\CRM\Funnel;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class FunnelListResponse extends ListResponse
{
    /**
     * @var array<Funnel>
     */
    public $funnels;

    protected function getCasts(): array
    {
        return [
            'funnels' => new AsArrayOfObjects(Funnel::class),
        ];
    }
}
