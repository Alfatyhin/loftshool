<?php

require_once 'src/functions.php';

$testArr = ['test1', 'test2', 'test3'];

// task 1
echo "<h2> task 1</h2> ";

echo task1($testArr, true);


//task 2

echo "<h2>task 2</h2>";

echo task2('+', 2, 3, 6, 7.28);



//task 3

echo "<h2>task 3</h2>
<style>
table th {
  background: #aaaaaa;
}
</style>";

$rowMax = 14;
$colMax = 22;
echo task3($rowMax, $colMax);


//task 4
echo "<h2> task 4 </h2>";

$date = date('d.m.Y H-m');

echo $date;

$date2 = strtotime('24.02.2016 00:00:00');

echo "<br>$date2";


//task 5
echo "<h2> task 5 </h2>";

$str = 'Карл у Клары украл Кораллы';
$repl = str_replace('К', '', $str);
echo "<br>$repl";

$str = 'Две бутылки лимонада';
$repl = str_replace('Две', 'Три', $str);
echo "<br>$repl";


//task 6 test7
echo "<h2> task 6 </h2>";

$fname = 'test.txt';
if (!file_exists($fname)) {
    $fp = fopen($fname, 'w');
    fwrite($fp, 'Hello again!');
    fclose($fp);
}

task4($fname);
