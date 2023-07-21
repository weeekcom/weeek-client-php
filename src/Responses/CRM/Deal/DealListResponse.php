<?php

namespace Weeek\Responses\CRM\Deal;

use Weeek\Models\CRM\Deal;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class DealListResponse extends ListResponse
{
    /**
     * @var array<Deal>
     */
    public $deals;

    protected $transform = [
        'hasMoreDeals' => 'hasMore',
    ];

    protected function getCasts(): array
    {
        return [
            'deals' => new AsArrayOfObjects(Deal::class),
        ];
    }
}
