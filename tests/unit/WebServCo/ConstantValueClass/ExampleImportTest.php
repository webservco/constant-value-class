<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

/**
* @covers \WebServCo\ConstantValueClass\ConstantValueClassTrait
*/
final class ExampleImportTest extends TestCase
{
    /**
     * @test
     */
    public function assertImportFromValueSame(): void
    {
        $instance = Example::fromValue(5);
        $this->assertSame($instance, Example::import());
    }

    /**
     * @test
     * @suppress PhanRedundantCondition
     * PHAN "Redundant attempt to cast Example::export() of type \Tests\ConstantValueClass\Example
     * to \Tests\ConstantValueClass\Example"
     */
    public function assertImportIsInstance(): void
    {
        $this->assertTrue(
            Example::import() instanceof Example,
        );
    }

    /**
     * @test
     */
    public function assertImportValueEquals(): void
    {
        $this->assertSame(5, Example::import()->value());
    }

    /**
    * @test
    */
    public function assertImportToStringIsString(): void
    {
        $this->assertIsString((string) Example::import());
    }

    /**
    * @test
    */
    public function assertImportToStringEquals(): void
    {
        $this->assertSame('5', (string) Example::import());
    }
}
