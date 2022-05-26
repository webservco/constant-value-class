<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

final class ExampleImportTest extends TestCase
{
    /**
     * @test
     */
    public function assertImportFromValueEquals(): void
    {
        $instance = Example::fromValue(5);
        $this->assertTrue(
            $instance === Example::import(),
        );
    }

    /**
     * @test
     */
    public function assertImportFromValueEqualsStrict(): void
    {
        $instance = Example::fromValue(5);
        $this->assertTrue(
            $instance === Example::import(),
        );
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
        $this->assertTrue(
            Example::import()->value() === 5,
        );
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
        $this->assertTrue((string) Example::import() === '5');
    }

    /**
    * @test
    */
    public function assertImportToStringEqualsStrict(): void
    {
        $this->assertTrue((string) Example::import() === '5');
    }
}
