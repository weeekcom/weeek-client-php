<?php

namespace Weeek;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Weeek\Endpoints\CRM\CRM;
use Weeek\Endpoints\TaskManager\TaskManager;
use Weeek\Endpoints\User\User;
use Weeek\Endpoints\Workspace\Workspace;

class Client
{
    public const VERSION  = '1.0.0';
    public const BASE_URL = 'https://api.weeek.net/public/v1';

    /**
     * @var User
     */
    public $user;

    /**
     * @var Workspace
     */
    public $workspace;

    /**
     * @var TaskManager
     */
    public $taskManager;

    /**
     * @var CRM
     */
    public $crm;

    public function __construct(
        string                  $token,
        ?string                 $baseUrl = null,
        ClientInterface         $httpClient = null,
        RequestFactoryInterface $requestFactory = null,
        StreamFactoryInterface  $streamFactory = null
    )
    {
        $http = new HttpClient($token, $baseUrl ?? self::BASE_URL, $httpClient, $requestFactory, $streamFactory);

        $this->user = new User($http);
        $this->workspace = new Workspace($http);
        $this->taskManager = new TaskManager($http);
        $this->crm = new CRM($http);
    }
}
