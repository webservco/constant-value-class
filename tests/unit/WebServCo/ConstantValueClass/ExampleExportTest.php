<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

/**
* @covers \WebServCo\ConstantValueClass\ConstantValueClassTrait
*/
final class ExampleExportTest extends TestCase
{
    /**
     * @test
     */
    public function assertExportFromValueSame(): void
    {
        $instance = Example::fromValue(1);
        $this->assertSame($instance, Example::export());
    }

    /**
     * @test
     * @suppress PhanRedundantCondition
     * PHAN "Redundant attempt to cast Example::export() of type \Tests\ConstantValueClass\Example
     * to \Tests\ConstantValueClass\Example"
     */
    public function assertExportIsInstance(): void
    {
        $this->assertTrue(
            Example::export() instanceof Example,
        );
    }

    /**
     * @test
     */
    public function assertExportValueEquals(): void
    {
        $this->assertSame(1, Example::export()->value());
    }

    /**
    * @test
    */
    public function assertExportToStringIsString(): void
    {
        $this->assertIsString((string) Example::export());
    }

    /**
    * @test
    */
    public function assertExportToStringEquals(): void
    {
        $this->assertSame('1', (string) Example::export());
    }
}
