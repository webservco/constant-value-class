<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

/**
* @covers \WebServCo\ConstantValueClass\ConstantValueClassTrait
*/
final class ExampleExportTest extends TestCase
{
    public function testAssertExportFromValueSame(): void
    {
        $instance = Example::fromValue(1);
        self::assertSame($instance, Example::export());
    }

    public function testAssertExportValueEquals(): void
    {
        self::assertSame(1, Example::export()->value());
    }

    public function testAssertExportToStringIsString(): void
    {
        self::assertIsString((string) Example::export());
    }

    public function testAssertExportToStringEquals(): void
    {
        self::assertSame('1', (string) Example::export());
    }
}
