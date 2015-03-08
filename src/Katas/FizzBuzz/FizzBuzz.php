<?php namespace Katas\FizzBuzz;

/**
 * Class FizzBuzz
 * @package Katas\FizzBuzz
 * @author  Valentin PRUGNAUD <valentin@whatdafox.com>
 * @url http://www.foxted.com
 */
class FizzBuzz
{
    /**
     * @param $number
     * @return int
     */
    public function execute($number)
    {
        if( $this->isFizzBuzz($number) )
        {
            return 'FizzBuzz';
        }
        if( $this->isFizz($number) )
        {
            return 'Fizz';
        }

        if( $this->isBuzz($number) )
        {
            return 'Buzz';
        }

        return $number;
    }

    /**
     * @param $number
     * @return bool
     */
    private function isFizz($number)
    {
        return $number % 3 == 0;
    }

    /**
     * @param $number
     * @return bool
     */
    private function isBuzz($number)
    {
        return $number % 5 == 0;
    }

    /**
     * @param $number
     * @return bool
     */
    private function isFizzBuzz($number)
    {
        return $number % 15 == 0;
    }

    public function executeUpTo($number)
    {
        return array_map(function($i){
            return $this->execute($i);
        }, range(1, $number));
    }
}
