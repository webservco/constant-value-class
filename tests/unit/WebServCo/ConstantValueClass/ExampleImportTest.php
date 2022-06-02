<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

/**
* @covers \WebServCo\ConstantValueClass\ConstantValueClassTrait
*/
final class ExampleImportTest extends TestCase
{
    public function testAssertImportFromValueSame(): void
    {
        $instance = Example::fromValue(5);
        self::assertSame($instance, Example::import());
    }

    public function testImportValueEquals(): void
    {
        self::assertSame(5, Example::import()->value());
    }

    public function testAssertImportToStringIsString(): void
    {
        self::assertIsString((string) Example::import());
    }

    public function testAssertImportToStringEquals(): void
    {
        self::assertSame('5', (string) Example::import());
    }
}
