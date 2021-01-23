<?php

//интерфейс для тарифов
interface iCountTarife
{
    public function getCount();
    public function addServices($serviceName);
    public function getMinutes(): int;
    public function getDistance(): int;
}