<?php

namespace Weeek\Endpoints\Workspace;

use Psr\Http\Client\ClientExceptionInterface;
use Weeek\Endpoints\Endpoint;
use Weeek\Exceptions\ApiErrorException;
use Weeek\Exceptions\TransportException;
use Weeek\Exceptions\UnexpectedResponseException;
use Weeek\HttpClient;
use Weeek\Responses\Workspace\Workspace\WorkspaceInfoResponse;
use Weeek\Responses\Workspace\Workspace\WorkspaceMembersResponse;

class Workspace extends Endpoint
{

    protected $prefix = '/ws';

    /**
     * @var Tags
     */
    public $tags;

    public function __construct(HttpClient $http)
    {
        $this->tags = new Tags($http);

        parent::__construct($http);
    }

    /**
     * @return WorkspaceInfoResponse
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function info(): WorkspaceInfoResponse
    {
        return $this->get('/', [], WorkspaceInfoResponse::class);
    }

    /**
     * @return WorkspaceMembersResponse
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws TransportException
     * @throws UnexpectedResponseException
     */
    public function members(): WorkspaceMembersResponse
    {
        return $this->get('/members', [], WorkspaceMembersResponse::class);
    }
}
