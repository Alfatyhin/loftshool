<?php

function task1($array, $flag = false)
{
    $result = '';
    foreach ($array as $key => $str) {
        if ($flag) {
            $result .= ' ' . $str;
        } else {
            echo "<p> $str </p>";
        }
    }
    if ($flag) {
        $result = "<p> $result </p>";
        return $result;
    }
}


function task2(string $operant, ...$arr): string
{
    $num1 = array_shift($arr);
    $res = $num1;
    foreach ($arr as $k => $num) {
        switch ($operant) {
            case '+':
                $res += $num;
                break;
            case '-':
                $res -= $num;
                break;
            case '/':
                $res = $res / $num;
                break;
            case '*':
                $res = $res * $num;
                break;
            default:
                $res = "не допустимый оператор";
        }
    }

    $out = implode(" $operant ", $arr);
    return "$num1 $operant $out = $res";
}


function task3($rowMax, $collMax)
{
    if (is_int($rowMax) && is_int($collMax)) {
        $str .= "<table rules='all' border='3'>";

        $str .= "<tr><th>  </th>";
        for ($header = 1; $header <= $collMax; $header++) {
            $str .= "<th> $header </th>";
        }
        $str .= "</tr>";

        for ($line = 1; $line <= $rowMax; $line++) {
            $str .= "<tr><th> $line </th>";

            for ($column = 1; $column <= $collMax; $column++) {
                $res = $line * $column;

                $str .= "<td title='$line * $column'> $res </td>";
            }
            $str .= "</tr>";
        }
        $str .= "</table>";
        return $str;
    } else {
        return "<p> используйте только целые числа</p>";
    }
}
