<?php declare(strict_types = 1);

namespace WebServCo\ConstantValueClass;

interface ConstantValueClassInterface
{

    /**
    * @param int|string $value
    */
    public static function fromValue($value): self;

    /**
    * Return class instance constant value.
    *
    * @return int|string
    */
    public function value();

    public function __toString(): string;
}
