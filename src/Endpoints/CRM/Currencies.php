<?php

namespace Weeek\Endpoints\CRM;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\CRM\Currency\CurrencyListResponse;

class Currencies extends Endpoint
{
    protected $prefix = '/crm/currencies';

    /**
     * @return CurrencyListResponse
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function getAll(): CurrencyListResponse
    {
        return $this->get('/', [], CurrencyListResponse::class);
    }
}
