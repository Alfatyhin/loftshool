<?php

//абстрактный класс тарифов
abstract class TarifAbstract implements iCountTarife
{
    protected $priceKilometer;
    protected $priceMinute;
    protected $distance;
    protected $minutes;
    protected $count;

    // конструктор создает объект в классе наследнике
    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
        // вызываем функцию которая записывает общую сумму при создании объекта
        $this->count();
    }

    // убрал из интарфейса чтоб создать её как protected
    protected function count()
    {
        $this->count = $this->distance * $this->priceKilometer + $this->minutes * $this->priceMinute;
    }

    public function getCount()
    {
        return $this->count;
    }

    /* поскольку используется время тарифа то либо его надо передавать либо получать из объекта и использовать
    но поскольку доп услуга может использовать свой алгоритм обработки времени то лучше нередавать
      ** кстати у услуги может быть отдельный учет времени,
      например радио работало 45 минут а сама поедка длилась 1.5 часа
      теоретически надо задать возможность передавать время усуги в параметре,
      а если нет то использовать время объекта
    */
    public function addServices($serviceName)
    {
        // не знаю возможно ли вызвать функцию класса не создавая его екземпляр
        // и если возможно то как
        // но по крайне мере так работает )))
        $service = new $serviceName($serviceName);
        $this->count += $service->countService($this->minutes);
        /* наблюдаемая прблема что можно боее одного раза добавить сервис
         но можнт это и плюс в случае например 2 кофе
         и вообще такая проверка не задана заданием
         и дожна быть возможность удалить услугу но это выходит за рамки задания
        */
    }

    // проверка получения статической функции
    // так тоже работает
    public function testStats($serviceName)
    {
        $this->count += $serviceName::count($this->minutes);
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
