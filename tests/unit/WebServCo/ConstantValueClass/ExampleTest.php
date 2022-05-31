<?php

declare(strict_types=1);

namespace Tests\ConstantValueClass;

use PHPUnit\Framework\TestCase;

/**
* @covers \WebServCo\ConstantValueClass\ConstantValueClassTrait
*/
final class ExampleTest extends TestCase
{
    /**
    * @test
    */
    public function assertInvalidFromValueThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Example::fromValue(99);
    }
}
