<?php declare(strict_types = 1);

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
            $instance === Example::import()
        );
    }

    /**
     * @test
     */
    public function assertImportFromValueEqualsStrict(): void
    {
        $instance = Example::fromValue(5);
        $this->assertTrue(
            $instance === Example::import()
        );
    }

    /**
     * @test
     */
    public function assertImportIsInstance(): void
    {
        $this->assertTrue(
            Example::import() instanceof Example
        );
    }

    /**
     * @test
     */
    public function assertImportValueEquals(): void
    {
        $this->assertTrue(
            5 === Example::import()->value()
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
        $this->assertTrue('5' === (string) Example::import());
    }

    /**
    * @test
    */
    public function assertImportToStringEqualsStrict(): void
    {
        $this->assertTrue('5' === (string) Example::import());
    }
}
