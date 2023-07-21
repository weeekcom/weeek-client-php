<?php

namespace Weeek\Responses\CRM\Deal;

use Weeek\Models\CRM\Deal;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\ListResponse;

class DealResponse extends ListResponse
{
    /**
     * @var Deal
     */
    public $deal;

    protected function getCasts(): array
    {
        return [
            'deal' => new AsObject(Deal::class),
        ];
    }
}
