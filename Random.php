<?php

/**
 * Class Random
 *
 * Implement a random number generator
 * using the linear congruential method.
 *
 */

class Random
{
    public $var_start;
    public $var_reset;
    public $var_a = 106;
    public $var_c = 1283;
    public $var_m = 6075;


    /**
     * Random constructor.
     *
     * in claas, the $var_start $var_reset variable is assigned to the value of the $seed argument
     *
     * @param $seed
     */
    public function __construct($seed)
    {
        $this->seed = $seed;
        $this->var_start = $seed;
        $this->var_reset = $seed;

    }

    /**
     * Implement a random number generator
     *
     * @return int
     */

    public function getNext()
    {
        $this->var_start = ($this->var_a * $this->var_start + $this->var_c) % $this->var_m;
        return $this->var_start;

    }

    /**
     * resets the generator to the initial value
     */

    public function reset()
    {
        $this->var_start = $this->var_reset;
    }
}

$param = new Random(100);

echo $param->var_start;
echo $param->var_reset;


echo $res1 = $param->getNext();
echo $res2 = $param->getNext();

$param->reset();

echo $res1 = $param->getNext();
echo $res2 = $param->getNext();



