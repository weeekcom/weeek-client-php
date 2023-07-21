<?php

namespace Weeek\Models\CRM;

use Weeek\Objects\AbstractObject;

class Organization extends AbstractObject
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $creatorId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array<string>
     */
    public $addresses;

    /**
     * @var array<string>
     */
    public $emails;

    /**
     * @var array<string>
     */
    public $phones;

    /**
     * @var array<string>
     */
    public $responsibles;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;
}
