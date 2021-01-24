<?php


class ServiceGPS extends ServicesAbstract
{
    protected $priceHour = 15;
    static public $price = 15;

    public function countService($time)
    {
        $this->result = ceil($time / 60) * $this->priceHour;
        return $this->result;
    }

    // поскольку в данном случае по сути тут нужны только методы реализации
    // и можно обойтись без создания объектов
    // мне кажется что так даже лучше
    static public function count($time)
    {

        $test = ceil($time / 60) * self::$price;
        return $test;
    }
}