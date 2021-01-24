<?php


class ServiceGPS extends ServicesAbstract
{
    protected $priceHour = 15;

    public function countService($time)
    {
        return ceil($time / 60) * $this->priceHour;;
    }
}