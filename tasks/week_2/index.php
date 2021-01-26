<?php

require_once('src/functions.php');


//task 3.1
echo "<h2> task 3.1 </h2>";

$arrayNames = ["Петя", "Маша", "Таня", "Юра", "Вейдер"];

for ($id = 0; $id < 50; $id++) {

    $users[] = [
        'id'   => "$id",
        // добавлена библиотечная функция
        // неожиданно втавлять так функции )))
        'name' => $arrayNames[array_rand($arrayNames)],
        'age'  => mt_rand(18, 45)
    ];
}

// более простоая запись в файл
file_put_contents('users.json',  json_encode($users));


$users2 = json_decode(file_get_contents('users.json'), true);

task1($users2);

