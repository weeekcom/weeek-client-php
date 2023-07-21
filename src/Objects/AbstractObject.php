<?php

namespace Weeek\Objects;

use Weeek\Objects\Interfaces\CastInterface;

abstract class AbstractObject
{
    /**
     * @var array<CastInterface>
     */
    protected $casts = [];

    /**
     * @var array<string>
     */
    protected $transform = [];

    public function __construct($attributes)
    {
        $this->casts = $this->getCasts();

        $this->fill($attributes);
    }

    /**
     * @return array<CastInterface>
     */
    protected function getCasts(): array
    {
        return [];
    }

    protected function fill(array $attributes): AbstractObject
    {
        foreach ($attributes as $attribute => $value) {
            $this->setAttribute($attribute, $value);
        }

        return $this;
    }

    private function setAttribute($attribute, $value): void
    {
        $result = $value;

        if (\array_key_exists($attribute, $this->casts)) {
            $caster = $this->casts[$attribute];
            $result = $caster->cast($value);
        }

        if (isset($this->transform[$attribute])) {
            $this->setAttribute($this->transform[$attribute], $value);
        }

        if (\property_exists($this, $attribute)) {
            $this->$attribute = $result;
        }
    }
}
