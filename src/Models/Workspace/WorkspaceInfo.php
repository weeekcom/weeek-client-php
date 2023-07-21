<?php

namespace Weeek\Models\Workspace;

use Weeek\Objects\AbstractObject;

class WorkspaceInfo extends AbstractObject
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
     * @var string|null
     */
    public $description;

    /**
     * @var string|null
     */
    public $logo;
}
