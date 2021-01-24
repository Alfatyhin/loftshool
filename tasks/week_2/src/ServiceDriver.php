<?php


class ServiceDriver extends ServicesAbstract
{
    protected $priceHour = 100;

    public function countService($time)
    {
        return $this->priceHour;
    }
}