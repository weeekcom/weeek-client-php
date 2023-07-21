<?php

namespace Weeek\Models\CRM;

use Weeek\Objects\AbstractObject;

class Currency extends AbstractObject
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
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $symbol;
}
