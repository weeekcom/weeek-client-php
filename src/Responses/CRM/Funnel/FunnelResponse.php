<?php

namespace Weeek\Responses\CRM\Funnel;

use Weeek\Models\CRM\Funnel;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class FunnelResponse extends Response
{
    /**
     * @var Funnel
     */
    public $funnel;

    protected function getCasts(): array
    {
        return [
            'funnel' => new AsObject(Funnel::class),
        ];
    }
}
