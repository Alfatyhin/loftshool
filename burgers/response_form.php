<?php

$name    = $_POST['name'];
$phone   = $_POST['phone'];
$email   = $_POST['email'];

$street  = $_POST['street'];
$home    = $_POST['home'];
$part    = $_POST['part'];
$appt    = $_POST['appt'];
$floor   = $_POST['floor'];

$comment  = $_POST['comment'];
$payment  = $_POST['payment'];
$callback = $_POST['callback'];

$clients["$email"] = [
    'Имя'     => $name,
    'Телефон' => $phone,
    'email'   => $email,
    'Адрес'   => [
        'улица'    => $street,
        'дом'      => $home,
        'корнус'   => $part,
        'этаж'     => $floor,
        'квартира' => $appt
    ],
    'коментарий' => $comment,
    'оплата' => $payment,
    'перезвон' => $callback
];
