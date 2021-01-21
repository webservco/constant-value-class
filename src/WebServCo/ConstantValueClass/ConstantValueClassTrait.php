<?php
namespace WebServCo\ConstantValueClass;

trait ConstantValueClassTrait
{
    /**
    * @var array<float|int|string,self>
    */
    private static array $instances = [];

    /**
    * @var float|int|string
    */
    private $value;

    /**
    * @param float|int|string $value
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
    * @return float|int|string
    */
    public function value()
    {
        return $this->value;
    }

    /**
    *  @param float|int|string $value
    */
    final private function __construct($value)
    {
        $this->value = $value;
    }

    /**
    * @param float|int|string $value
    * @return self
    */
    private static function constant($value) : self
    {
        return self::$instances[$value] ?? self::$instances[$value] = new self($value);
    }

    /**
    * @return array<string,float|int|string>
    */
    private static function getConstants() : array
    {
        $reflection = new \ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}
