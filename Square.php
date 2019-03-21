<?php

declare(strict_types=1);

namespace square;

/**
 * Класс Square реализует параметры сущности квадрата.
 * Методы класса принимают жестко типизированные данные,
 * и передают полученный параметр для использования вне класса.
 */

class Square
{
    private $sideSquare;

    public function __construct(float $side)
    {
        $this->sideSquare = $side;
    }

    public function getSide()
    {
        return $this->side;
    }

}


