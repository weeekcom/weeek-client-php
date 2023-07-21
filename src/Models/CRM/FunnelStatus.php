<?php

namespace Weeek\Models\CRM;

use Weeek\Objects\AbstractObject;

class FunnelStatus extends AbstractObject
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
     * @var int
     */
    public $dealsCount;

    /**
     * @var float
     */
    public $dealsAmount;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
     */
    public $updatedAt;
}
