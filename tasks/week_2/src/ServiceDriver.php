<?php


class ServiceDriver extends ServicesAbstract
{
    protected $priceHour = 100;

    public function countService($time)
    {
        $this->result = $this->priceHour;
        return $this->result;
    }
}