<?php
namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

final class ExampleExportTest extends TestCase
{
    /**
     * @test
     */
    public function assertExportFromValueEquals() : void
    {
        $instance = Example::fromValue(1);
        $this->assertTrue(
            $instance == Example::export()
        );
    }

    /**
     * @test
     */
    public function assertExportFromValueEqualsStrict() : void
    {
        $instance = Example::fromValue(1);
        $this->assertTrue(
            $instance === Example::export()
        );
    }

    /**
     * @test
     */
    public function assertExportIsInstance() : void
    {
        $this->assertTrue(
            Example::export() instanceof Example
        );
    }

    /**
     * @test
     */
    public function assertExportValueEquals() : void
    {
        $this->assertTrue(
            Example::export()->value() == 1
        );
    }
}
