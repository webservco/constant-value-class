<?php
namespace WebServCo\ConstantValueClass;

interface ConstantValueClassInterface
{
    public function __toString() : string;

    /**
    * @param int|string $value
    * @return self
    */
    public static function fromValue($value): self;

    /**
    * Return class instance constant value.
    *
    * @return float|int|string
    */
    public function value();
}
