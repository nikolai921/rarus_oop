<?php

declare(strict_types=1);

/**
 * Класс Random реализует сущность генератора случайных чисел.
 *
 * На  вход принимаеются данные строгой типизации целочисленного значения.
 * Методом __construct, производится проверка входных данных,
 * с присвоением полученных значений свойствам.
 *
 * Его единственной обязанностью является вычисление случайного числа, по заданному алгоритму.
 * Методы класса, реализуют вычисление случайного числа, а именно метод getNext(), так же выводы полученных результатов
 * и сброс генератора на начальное значение.
 *
 */

class Random
{
    private $seed;
    private $initialValue;
    private $resetValue;
    private static $coefficientA = 106;
    private static $coefficientC = 1283;
    private static $coefficientM = 6075;

    public function __construct(int $seed)
    {
        $this->seed = $seed;
        $this->resetValue = $seed;
        $this->initialValue = $seed;
    }

    public function getNext()
    {
        $this->initialValue = (self::$coefficientA * $this->initialValue + self::$coefficientC) % self::$coefficientM;
        return $this->initialValue;
    }

    public function reset()
    {
        $this->initialValue = $this->resetValue;
    }
}

$param = new Random(100);

echo $res1 = $param->getNext();
echo $res2 = $param->getNext();


$param->reset();


echo $res21 = $param->getNext();
echo $res22 = $param->getNext();



