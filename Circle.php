<?php

/**
 * Class Circle
 * Includes a set of methods and properties for the implementation
 * of calculations of the area and perimeter of the circle
 */

class Circle
{

    const CONSTANT = 3.14;


    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * Implements the calculation of the area of a circle, taking the property $radius
     *
     * @return float|int
     */
    public function getArea()
    {
        return self::CONSTANT * $this->radius * $this->radius;
    }

    /**
     * Implements the calculation of the perimeter of the circle, taking the property $radius
     *
     * @return float|int
     */
    public function getCircumference()
    {
        return 2 * self::CONSTANT * $this->radius;
    }
}

$param = new Circle(5);

echo $param->getArea();
echo $param->getCircumference();