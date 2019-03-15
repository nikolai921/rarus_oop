<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 15.03.19
 * Time: 0:46
 */

require_once('Square.php');

use square as variable;


/**
 * Class SquaresGenerator
 *
 * includes a static set generate
 */

class SquaresGenerator
{
    /**
     * returns an array of class objects Square
     *
     * @param $side
     * @param $value
     *
     * @return array
     */

    public static function generate($side, $value)
    {
        for($i = 1; $i <=$value; $i++)
        {
            $result[] = new variable\Square($side);
        }
        return $result;
    }
}

$squares = SquaresGenerator::generate(3, 2);
