<?php

namespace Weeek\Responses\CRM\Organization;

use Weeek\Models\CRM\Organization;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class OrganizationResponse extends Response
{
    /**
     * @var Organization
     */
    public $organization;

    protected function getCasts(): array
    {
        return [
            'organization' => new AsObject(Organization::class),
        ];
    }
}
