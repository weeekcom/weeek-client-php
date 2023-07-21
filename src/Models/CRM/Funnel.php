<?php

namespace Weeek\Models\CRM;

use Weeek\Objects\AbstractObject;

class Funnel extends AbstractObject
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
     * @var int
     */
    public $currencyId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $logo;

    /**
     * @var int
     */
    public $dealsCount;

    /**
     * @var float
     */
    public $dealsAmount;

    /**
     * @var bool
     */
    public $isPrivate;

    /**
     * @var bool
     */
    public $isBookmarked;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;

    /**
     * @var array<string>
     */
    public $team;
}
