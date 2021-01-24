<?php


abstract class ServicesAbstract implements iServices
{
    protected $priceHour;
    protected $serviceName;

    public function __construct($name)
    {
        $this->serviceName = $name;
    }

    public function countService($time)
    {
        $this->result = $time * $this->priceHour;
        return $this->result;
    }


}