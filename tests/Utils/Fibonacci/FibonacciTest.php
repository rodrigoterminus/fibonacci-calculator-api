<?php

namespace Tests\Utils\Fibonacci;

use App\Utils\Fibonacci\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    private Fibonacci $fibonacci;

    protected function setUp(): void
    {
        $this->fibonacci = new Fibonacci();
        parent::setUp();
    }

    public function testGetNumberShouldThrowExceptionIfNIsNegative()
    {
        $this->expectException(\Exception::class);
        $this->fibonacci->getNumber(-1);
    }

    /**
     * @param int|float $expected
     * @param int $n
     * @throws \Exception
     * @dataProvider getNumberProvider
     */
    public function testGetNumber(int|float $expected, int $n)
    {
        $this->assertEqualsWithDelta(
            $expected,
            $this->fibonacci->getNumber($n),
            0.0001,
        );
    }

    public function getNumberProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
            [1, 2],
            [2, 3],
            [5, 5],
            [21, 8],
            [233, 13],
            [10946, 21],
            [5702887, 34],
            [139583862445, 55],
        ];
    }
}
