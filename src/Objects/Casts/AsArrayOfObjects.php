<?php

namespace Weeek\Objects\Casts;

use Weeek\Objects\Interfaces\CastInterface;

class AsArrayOfObjects implements CastInterface
{
    public $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    public function cast($value): array
    {
        return \array_map(function ($attributes) {
            return new $this->class($attributes);
        }, $value);
    }
}