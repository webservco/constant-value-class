<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

/**
* An example implementation: a class that handles shipping types.
*/
class Example implements \WebServCo\ConstantValueClass\ConstantValueClassInterface
{
    use \WebServCo\ConstantValueClass\ConstantValueClassTrait;

    private const EXPORT = 1;
    private const IMPORT = 5;

    public static function export(): self
    {
        return self::constant(self::EXPORT);
    }

    public static function import(): self
    {
        return self::constant(self::IMPORT);
    }
}
