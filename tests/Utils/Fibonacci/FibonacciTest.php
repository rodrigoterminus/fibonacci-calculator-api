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
     * @param int $expected
     * @param int $n
     * @dataProvider getNumberProvider
     */
    public function testGetNumber(int $expected, int $n)
    {
        $this->assertEquals(
            $expected,
            $this->fibonacci->getNumber($n),
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
            [1779979416004714189, 89],
            [555565404224292694404015791808, 144],
        ];
    }
}
