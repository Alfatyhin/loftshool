<?php

// task 1
echo "<h2> task 1 </h2>";

$name = 'Александр';
$age = 42;

echo "<br /> Меня зовут: $name";

echo "<br /> Мне $age лет";

echo "<br /> \"!|/\\'\"\\";


// task 2
echo "<h2> task 2 </h2>";

const IMAGE = 80;
const IMAGE_FELT = 23;
const IMAGE_PEN = 40;

echo "<p> На школьной выставке ". IMAGE ." рисунков.".
IMAGE_FELT ." из них выполнены фломастерами, ". IMAGE_PEN ." карандашами, а остальные — красками. <br />
Сколько рисунков, выполненные красками, на школьной выставке? </p>";

$imagePaints = IMAGE - IMAGE_FELT - IMAGE_PEN;

echo "<p> Ответ: $imagePaints </p>";




// task 3
echo "<h2> task 3 </h2>";

$age = 33;

if ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать";
} elseif ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать";
} elseif ($age > 65) {
    echo "Вам пора на пенсию";
} else {
    echo "Неизвестный возраст";
}




// task 4
echo "<h2> task 4 </h2>";

$dey = 6;

switch ($dey) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
}





// task 5
echo "<h2> task 5 </h2>";

$bmw  = array (
    "model" => 'X5',
    "speed" => '120',
    "doors" => '4',
    "year"  => '2015'
);

$toyota  = array (
    "model" => 'ZX',
    "speed" => '140',
    "doors" => '2',
    "year"  => '2010'
);

$opel  = array (
    "model" => 'Astra',
    "speed" => '136',
    "doors" => '5',
    "year"  => '2007'
);

$cars = array(
    "bmw"    => $bmw,
    "toyota" => $toyota,
    "opel"   => $opel
);

foreach ($cars as $carName => $carData) {
    echo "<hr />CAR $carName <br />";
    foreach ($carData as $dataKey => $dataValue) {
        echo "$dataValue ";
    }
};



// task 5
echo "<h2> task 5 </h2>
<style>
table th {
  background: #aaaaaa;
}
</style>";

echo "<table rules='all' border='3'>";

echo "<tr><th> / </th>";
for ($header = 1; $header <= 10; $header++) {
    echo "<th> $header </th>";
}
echo "</tr>";

for ($line=1; $line <= 10; $line++) {
    echo "<tr><th> $line </th>";
    $lineEven = ($line % 2 == 0);

    for ($column = 1; $column <= 10; $column++) {
        $res = $line * $column;

        $columnEven = ($column % 2 == 0);

        if ($lineEven && $columnEven) {
            echo "<td> ($res) </td>";
        } elseif (!$lineEven && !$columnEven) {
            echo "<td> [$res] </td>";
        } else {
            echo "<td> $res </td>";
        }

    }
    echo "</tr>";
}

echo "</table>";
