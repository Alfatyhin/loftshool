<?php


// создаем почасовый тариф
class TarifHour extends TarifAbstract
{
    protected $priceKilometer = 0;
    protected $priceMinute = 200;


    public function count()
    {
        $this->count = $this->distance * $this->priceKilometer + ceil($this->minutes / 60) * $this->priceMinute;
    }


}
