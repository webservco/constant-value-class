<?php

declare(strict_types=1);

namespace WebServCo\ConstantValueClass;

interface ConstantValueClassInterface
{
    public function __toString(): string;

    /**
    * @param int|string $value
    * @return self
    */
    public static function fromValue($value): self;

    /**
    * Return class instance constant value.
    *
    * @return int|string
    */
    public function value();
}
