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
    public function assertExportFromValueEquals(): void
    {
        $instance = Example::fromValue(1);
        $this->assertTrue(
            $instance === Example::export(),
        );
    }

    /**
     * @test
     */
    public function assertExportFromValueEqualsStrict(): void
    {
        $instance = Example::fromValue(1);
        $this->assertTrue(
            $instance === Example::export(),
        );
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
        $this->assertTrue(
            Example::export()->value() === 1,
        );
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
        $this->assertTrue((string) Example::export() === '1');
    }

    /**
    * @test
    */
    public function assertExportToStringEqualsStrict(): void
    {
        $this->assertTrue((string) Example::export() === '1');
    }
}
