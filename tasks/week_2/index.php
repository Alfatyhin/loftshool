<?php

require_once('src/functions.php');


//task 3.1
echo "<h2> task 3.1 </h2>";

$arrayNames = ["Петя", "Маша", "Таня", "Юра", "Вейдер"];

for ($id = 1; $id <= 50; $id++) {
    $randName = mt_rand(0, 4);
    $name = $arrayNames[$randName];
    $age = mt_rand(18, 45);

    $users[] = [
        'id'   => "$id",
        'name' => "$name",
        'age'  => "$age"
    ];
}

$usersJson = json_encode($users);

$fp = fopen('users.json', "w");
fwrite($fp, $usersJson);
fclose($fp);

$users2 = json_decode(file_get_contents('users.json'), true);

task1($users2);


