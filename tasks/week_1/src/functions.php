<?php

function task1($array, $flag = false)
{
    $result = '';
    foreach ($array as $key => $str) {
        if ($flag) {
            $result .= ' ' . $str;
        } else {
            $result .= "<p> $str </p>";
        }
    }
    if ($flag) {
        $result = "<p> $result </p>";
    }
    return $result;
}


function task2(string $operant, $num1, ...$arr): string
{
    $res = $num1;
    switch ($operant) {
        case '+':
            foreach ($arr as $k => $num) {
                 $res += $num;
            }
            break;
        case '-':
            foreach ($arr as $k => $num) {
                $res -= $num;
            }
            break;
        case '/':
            foreach ($arr as $k => $num) {
                $res = $res / $num;
            }
            break;
        case '*':
            foreach ($arr as $k => $num) {
                $res = $res * $num;
            }
            break;
        default:
            $res = "не допустимый оператор";
    }
    $out = implode(" $operant ", $arr);
    return "$num1 $operant $out = $res";
}


function task3($rowMax, $collMax)
{

    $str .= "<table rules='all' border='3'>";

    $str .= "<tr><th>  </th>";
    for ($header = 1; $header <= $collMax; $header++) {
        $str .= "<th> $header </th>";
    }
    $str .= "</tr>";

    for ($line=1; $line <= $rowMax; $line++) {
        $str .= "<tr><th> $line </th>";

        for ($column = 1; $column <= $collMax; $column++) {
            $res = $line * $column;

            $str .= "<td title='$line * $column'> $res </td>";
        }
        $str .= "</tr>";
    }

    $str .= "</table>";
    return $str;
}
