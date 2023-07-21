<?php

namespace Weeek\Models\Workspace;

use Weeek\Objects\AbstractObject;

class WorkspaceMember extends AbstractObject
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string|null
     */
    public $logo;

    /**
     * @var string|null
     */
    public $lastName;

    /**
     * @var string|null
     */
    public $firstName;

    /**
     * @var string|null
     */
    public $middleName;

    /**
     * @var string|null
     */
    public $position;

    /**
     * @var string
     */
    public $timeZone;
}
