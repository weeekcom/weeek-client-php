<?php

namespace Weeek\Objects\Casts;

use Weeek\Objects\Interfaces\CastInterface;

class AsObject implements CastInterface
{
    public $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    public function cast($value)
    {
        return new $this->class($value);
    }
}