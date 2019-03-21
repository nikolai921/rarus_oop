<?php

declare(strict_types=1);

require_once('Square.php');

use square as variable;

/**
 * Класс SquaresGenerator
 *
 * Реализует сущность, набора экземпляров квадратов.
 *
 * За счет метода generate производится формирование массива объектов класса Square.
 *
 */

class SquaresGenerator
{
    public static function generate(float $side, int $value)
    {
        for($i = 1; $i <= $value; $i++)
        {
            $result[] = new variable\Square($side);
        }
        return $result;
    }
}

