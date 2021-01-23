<?php


class ServiceGPS extends ServicesAbstract
{
    protected $priceHour = 15;

    public function countService($time)
    {
        $this->result = ceil($time / 60) * $this->priceHour;
        return $this->result;
    }
}