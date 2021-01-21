<?php
//test function
function printPre($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}


function task1($array)
{
    foreach ($array as $k => $data) {
        $names[] = $data['name'];
        $allAge += $data['age'];
    }
    foreach (array_count_values($names) as $name => $count) {
        echo "$name = $count чел.<br>";
    }
    $srage = $allAge / ($k + 1);
    echo "Средний возраст = $srage лет";
}
