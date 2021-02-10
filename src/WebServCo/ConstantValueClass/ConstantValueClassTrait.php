<?php declare(strict_types = 1);

namespace WebServCo\ConstantValueClass;

trait ConstantValueClassTrait
{
    /**
    * @var array<int|string,self>
    */
    private static array $instances = [];

    /**
    * @var int|string
    */
    private $value;

    /**
    * Return class instance constant value as string.
    */
    public function __toString(): string
    {
        return (string) $this->value;
    }

    /**
    * @param int|string $value
    * @return self
    */
    public static function fromValue($value): self
    {
        $constants = self::getConstants();
        if (!in_array($value, $constants)) {
            throw new \InvalidArgumentException(sprintf('Invalid argument: "%s".', $value));
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
    *  @param int|string $value
    */
    final private function __construct($value)
    {
        $this->value = $value;
    }

    /**
    * @param int|string $value
    * @return self
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
        $reflection = new \ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}
