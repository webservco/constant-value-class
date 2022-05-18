<?php

declare(strict_types=1);

namespace WebServCo\ConstantValueClass;

interface ConstantValueClassInterface
{
    /**
    * Return class instance constant value.
    *
    * @return int|string
    */
    public function value();

    /**
    * @param int|string $value
    */
    public static function fromValue($value): \WebServCo\ConstantValueClass\ConstantValueClassInterface;

    public function __toString(): string;
}
