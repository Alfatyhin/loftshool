<?php

//абстрактный класс тарифов
abstract class TarifAbstract implements iCountTarife
{
    protected $priceKilometer;
    protected $priceMinute;
    protected $distance;
    protected $minutes;
    /** @var iServices */
    protected $services;

    // конструктор создает объект в классе наследнике
    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;

    }

    // убрал из интарфейса чтоб создать её как protected
    // так как некоторые тарифы переопределяют эту фунцию то подсчет сервисов в getCount
    protected function count()
    {
        $count = $this->distance * $this->priceKilometer + $this->minutes * $this->priceMinute;
        return $count;
    }

    public function getCount()
    {
        $summ = $this->count();
        if ($this->services) {
            foreach ($this->services as $key => $service) {
                $summ += $service->countService($this->minutes);
            }
        }
        return $summ;
    }

    /* поскольку используется время тарифа то либо его надо передавать либо получать из объекта и использовать
    но поскольку доп услуга может использовать свой алгоритм обработки времени то лучше передавать
      ** кстати у услуги может быть отдельный учет времени,
      например радио работало 45 минут а сама поедка длилась 1.5 часа
      теоретически надо задать возможность передавать время усуги в параметре,
      а если нет то использовать время объекта
    */
    public function addServices($service)
    {
        // без этого ругается
        if (!$this->services) {
            $this->services = array();
        }
        // добавляем в массив сервисов
        // это логичнее так как мы можем в будущем получить список сервисов как свойство обекта
        array_push($this->services, $service);
        return $this;
        /* наблюдаемая прблема что можно боее одного раза добавить сервис
         но можнт это и плюс в случае например 2 кофе
         и вообще такая проверка не задана заданием
         и дожна быть возможность удалить услугу но это выходит за рамки задания
        */
    }


    // возвращаем значение дистанция
    public function getDistance(): int
    {
        return $this->minutes;
    }
    // возвращаем значение минуты
    public function getMinutes(): int
    {
        return $this->distance;
    }
}
