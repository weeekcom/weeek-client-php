<?php

namespace Weeek\Models\CRM;

use Weeek\Objects\AbstractObject;

class Contact extends AbstractObject
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
     * @var string|null
     */
    public $organizationId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $phone;

    /**
     * @var string|null
     */
    public $email;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;
}
