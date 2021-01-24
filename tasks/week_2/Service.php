<?php

include 'src/InterfaceTarife.php';
include 'src/TarifAbstract.php';
include 'src/TarifBasic.php';
include 'src/TarifHour.php';
include 'src/TarifStudents.php';

include 'src/InterfaceServices.php';
include 'src/ServicesAbstract.php';
include 'src/ServiceGPS.php';
include 'src/ServiceDriver.php';

echo "<br>TarifBase <br>";
//создаем объект
$carCher1 = new TarifBase(5,6);
// добавляем услуги
$carCher1->addServices('ServiceGPS');
$carCher1->testStats('ServiceGPS');
//$carCher1->addServices('driver');
//получаем результвт 68 + 15 = 83 + 15 = 98
echo $carCher1->getCount();

echo "<br>TarifHour <br>";
//создаем объект
$carCher2 = new TarifHour(4, 80);
// должно получиться 400
echo $carCher2->getCount();
// добавляем услугу GPS это + 30 = 230
echo "<br> + gps <br>";
$carCher2->addServices('ServiceGPS');
echo $carCher2->getCount();
;

echo "<br>TarifStudents <br>";
//создаем объект
$carCher3 = new TarifStudents(10,20);
$carCher3->addServices('ServiceGPS');
// 10 * 4 = 40 + 20 * 1 = 60 +15 = 75
$carCher3->addServices('ServiceDriver');
// 10 * 4 = 40 + 20 * 1 = 60 +15 = 75 + 100 = 175
echo $carCher3->getCount();
