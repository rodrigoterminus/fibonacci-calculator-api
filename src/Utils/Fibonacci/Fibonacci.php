<?php


namespace App\Utils\Fibonacci;


use App\Utils\Fibonacci\Exception\NegativeNException;


class Fibonacci implements FibonacciInterface
{

    /**
     * Calculate the N-th Fibonacci number.
     *
     * @param int $n
     * @return int|float
     * @throws NegativeNException
     */
    public function getNumber(int $n): int|float
    {
        if ($n < 0) {
            throw new NegativeNException('N must be grater than zero');
        }

        return round(pow((sqrt(5) + 1) / 2, $n) / sqrt(5));
    }
}