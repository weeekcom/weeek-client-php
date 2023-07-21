<?php

namespace Weeek\Responses\CRM\Organization;

use Weeek\Models\CRM\Organization;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class OrganizationListResponse extends ListResponse
{
    /**
     * @var array<Organization>
     */
    public $organizations;

    protected function getCasts(): array
    {
        return [
            'organizations' => new AsArrayOfObjects(Organization::class),
        ];
    }
}
