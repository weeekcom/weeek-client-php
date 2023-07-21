<?php

namespace Weeek\Endpoints\CRM;

use Weeek\Endpoints\Endpoint;
use Weeek\HttpClient;

class CRM extends Endpoint
{
    /**
     * @var Currencies
     */
    public $currencies;

    /**
     * @var Organizations
     */
    public $organizations;

    /**
     * @var Contacts
     */
    public $contacts;

    /**
     * @var Funnels
     */
    public $funnels;

    /**
     * @var FunnelStatuses
     */
    public $funnelStatuses;

    /**
     * @var Deals
     */
    public $deals;

    public function __construct(HttpClient $http)
    {
        $this->currencies = new Currencies($http);
        $this->organizations = new Organizations($http);
        $this->contacts = new Contacts($http);
        $this->funnels = new Funnels($http);
        $this->funnelStatuses = new FunnelStatuses($http);
        $this->deals = new Deals($http);

        parent::__construct($http);
    }
}