<?php

namespace Weeek\Models\Workspace;

use Weeek\Objects\AbstractObject;

class Tag extends AbstractObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $color;
}
