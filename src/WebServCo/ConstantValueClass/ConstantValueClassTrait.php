<?php

declare(strict_types=1);

namespace WebServCo\ConstantValueClass;

/**
* Trait to be used by all implementing code.
*
* @suppress PhanStaticPropIsStaticType
* PHAN PhanStaticPropIsStaticType "Static property \WebServCo\ConstantValueClass\ConstantValueClassTrait::$instances
* is declared to have type self[], but the only instance is shared among all subclasses
* (Did you mean \WebServCo\ConstantValueClass\ConstantValueClassTrait[])"
* No, it should be `self` as it's a trait and will be used to store implementing code instances.
*/
trait ConstantValueClassTrait
{
    /**
    * Value.
    *
    * @var int|string
    */
    private $value;

    /**
     * Instances.
     *
     * @var array<int|string,self>
     */
    private static array $instances = [];

    /**
    * Constructor is final and private
    *
    * @param int|string $value
    * @suppress PhanPrivateFinalMethod
    * PHAN PhanPrivateFinalMethod "PHP warns about private method
    * \WebServCo\ConstantValueClass\ConstantValueClassTrait::__construct() being final starting in php 8.0"
    * This should not be the case for __construct), besides this is a trait so valid to say final + private
    */
    final private function __construct($value)
    {
        $this->value = $value;
    }

    /**
    * @param int|string $value
    */
    public static function fromValue($value): self
    {
        $constants = self::getConstants();
        if (!\in_array($value, $constants, true)) {
            throw new \InvalidArgumentException(\sprintf('Invalid argument: "%s".', $value));
        }

        return self::constant($value);
    }

    /**
    * Return class instance constant value.
    *
    * @return int|string
    */
    public function value()
    {
        return $this->value;
    }

    /**
    * Method called by the custom methods in implementing classes.
    *
    * @suppress PhanTypeInstantiateTraitStaticOrSelf
    * PHAN PhanTypeInstantiateTraitStaticOrSelf "Potential instantiation of trait
    * \WebServCo\ConstantValueClass\ConstantValueClassTrait
    * (not an issue if this method is only called from a non-abstract class using the trait)"
    * @param int|string $value
    */
    private static function constant($value): self
    {
        return self::$instances[$value] ?? self::$instances[$value] = new self($value);
    }

    /**
    * @return array<string,int|string>
    */
    private static function getConstants(): array
    {
        $reflection = new \ReflectionClass(self::class);
        return $reflection->getConstants();
    }

    /**
    * Return class instance constant value as string.
    */
    public function __toString(): string
    {
        return (string) $this->value;
    }
}
