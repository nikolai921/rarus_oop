<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 15.03.19
 * Time: 0:27
 */

namespace square;

/**
 * Class Square
 *
 * describes the shape parameters of a square
 *
 * @package square
 */

class Square
{

    public function __construct($side)
    {
        $this->side = $side;
    }

    /**
     * returns the value of the side of the square
     *
     * @return mixed
     */

    public function getSide()
    {
        return $this->side;
    }


}


