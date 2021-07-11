<?php


namespace App\Utils\Fibonacci;


class Fibonacci implements FibonacciInterface
{

    /**
     * Calculate the N-th Fibonacci number.
     *
     * @param int $n
     * @return int|float
     * @throws \Exception
     */
    public function getNumber(int $n): int|float
    {
        if ($n < 0) {
            throw new \Exception('N must be grater than zero');
        }

        return round(pow((sqrt(5) + 1) / 2, $n) / sqrt(5));
    }
}