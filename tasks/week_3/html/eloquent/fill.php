<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.08.2019
 * Time: 22:38
 */
include 'init.php';

$faker = Faker\Factory::create('ru_RU');

for($i=0;$i<30;$i++)
{
    $user = new User();
    $user->name = $faker->name;
    $user->email = $faker->email;
    $user->password = $faker->password;
    $user->info = $faker->text;
    $user->created_at = $faker->dateTime;
    $user->age = mt_rand(18, 45);
    $user->save();

}

$users = User::all();

$images = array('0.52159300 1612270686-98450_Penguins.jpg', 'b8d800b5828f70a24363c530e3bac253.jpg', '0eafea1fbb8d6a6d1f85e9056e215e24.jpg');

$sizeUsers = sizeof($users);

foreach ($users as $user) {
    for($i=0;$i<5;$i++) {
        $post = new Post();
        $post->content = $faker->realText();
        $post->user_id = mt_rand(1, $sizeUsers);
        $post->image = $images[mt_rand(0,2)];
        $post->save();
    }
}

printLog();