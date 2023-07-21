<?php

namespace Weeek\Models\User;

use Weeek\Objects\AbstractObject;

class User extends AbstractObject
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
    public $logoLink;

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
    public $about;

    /**
     * @var string|null
     */
    public $position;

    /**
     * @var string
     */
    public $language;

    /**
     * @var string|null
     */
    public $birthDate;

    /**
     * @var string|null
     */
    public $country;

    /**
     * @var string|null
     */
    public $timeZone;

    /**
     * @var string|null
     */
    public $phoneNumber;
}
