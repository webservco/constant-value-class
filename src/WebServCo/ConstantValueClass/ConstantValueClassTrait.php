<?php

declare(strict_types=1);

namespace WebServCo\ConstantValueClass;

trait ConstantValueClassTrait
{

    /**
    * Value.
    *
    * @var int|string */
    private $value;

    /**
     * Instances.
     *
     * @var array<int|string,self>
     */
    private static array $instances = [];

    /**
    * @param int|string $value
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
