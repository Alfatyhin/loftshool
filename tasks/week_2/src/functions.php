<?php
//test function
function printPre($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}



function getNames($data)
{
    return $data['name'];
}
function getAge ($data)
{
    return $data['age'];
}

function task1($array)
{
    $names = array_map('getNames', $array);

    foreach (array_count_values($names) as $name => $count) {
        echo "$name = $count чел.<br>";
    }

    $srage =  array_sum(array_map('getAge', $array)) / sizeof($array);
    echo "Средний возраст = $srage лет <br>";
}
