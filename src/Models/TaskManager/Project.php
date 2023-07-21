<?php

namespace Weeek\Models\TaskManager;

use Weeek\Objects\AbstractObject;

class Project extends AbstractObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $logoLink;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string
     */
    public $color;

    /**
     * @var bool
     */
    public $isPrivate;

    /**
     * @var array<string>
     */
    public $team;
}
