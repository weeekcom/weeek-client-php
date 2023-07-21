<?php

namespace Weeek\Endpoints\User;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\Responses\User\UserResponse;

class User extends Endpoint
{
    protected $prefix = '/user';

    /**
     * @return UserResponse
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function me(): UserResponse
    {
        return $this->get('/me', [], UserResponse::class);
    }
}
