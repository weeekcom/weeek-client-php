<?php

namespace Weeek\Responses\CRM\Currency;

use Weeek\Models\CRM\Currency;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class CurrencyListResponse extends ListResponse
{
    /**
     * @var array<Currency>
     */
    public $currencies;

    protected function getCasts(): array
    {
        return [
            'currencies' => new AsArrayOfObjects(Currency::class),
        ];
    }
}
