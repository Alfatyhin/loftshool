<?php
//test function
function printPre($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}
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


function task2(string $operant, ...$arr)
{
    $num1 = array_shift($arr);
    $res = $num1;
    $err = 0;
    foreach ($arr as $k => $num) {

        if (is_int($num) || is_float($num)) {
            if ($num == 0 && $operant == '/') {
                trigger_error('на ноль делить нельзя');
                $err = 1;
            } else {
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
        } else {
            $err = 1;
            trigger_error('используйте числа');
        }

    }
    if ($err == 0) {
        $out = implode(" $operant ", $arr);
        return "$num1 $operant $out = $res";
    }
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
        trigger_error ( "используйте только целые числа");
    }
}
