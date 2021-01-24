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

if (!empty($_POST['callback'])) {
    $callback = $_POST['callback'];
} else {
    $callback = "Перезвонить";
}

echo '<html> <head></head> <body>';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=loftscool", 'loftphp', 'ss135sdjfhh');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

if ($email) {
    $tbClients = 'burger_clients';
    $tbOrders = 'burger_orders';

    //проверяем емейл
    $query = $pdo->prepare("SELECT * FROM $tbClients WHERE `email` = :client_email");
    $query->execute(['client_email' => $email]);
    $rowCount = $query->rowCount();

    if(empty($rowCount)) {
        //создаем пользователя
        $query = $pdo->prepare("INSERT INTO $tbClients (`email`, `name`, `phone_number`, `count_order`) values (?, ?, ?, ?)");
        $query->execute([$email, $name, $phone, '1']);

        $rowCount = $query->rowCount();

        if(empty($rowCount)) {
            echo "<p>ошибка оформления заказа 1</p>";
            $err = $query->errorInfo();
            var_dump($err);
            exit();
        } else {
            $count = 1;
            $id = $pdo->lastInsertId();
            echo "id = $id <br>";
        }
    } else {
        $clients = $query->fetchAll(PDO::FETCH_ASSOC);
        $client = $clients[0];

        //обновляем счетчик заказов
        $id = $client['id'];
        $count = ++$client['count_order'];
        $query = $pdo->prepare("UPDATE $tbClients SET `count_order` = ? WHERE id = ?");
        $query->execute([$count, $id]);

        $rowCount = $query->rowCount();

        if(empty($rowCount)) {
            echo "<p>ошибка оформления заказа 2</p>";
            $err = $query->errorInfo();
            var_dump($err);
            exit();
        }
    }

    //записываем новый заказ
    $date = Date('Y-m-d H:i:s');
    $adress = "улица - $street \n дом - $home \n корпус - $part \n этаж - $floor \n квартира - $appt";
    $desc = "коментарий - $comment \n оплата - $payment \n перезвон - $callback";

    $query = $pdo->prepare("INSERT INTO $tbOrders (`client_id`, `name`, `phone_number`, `date`, `adress`, `description`) 
    VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$id, $name, $phone, $date, $adress, $desc]);
    $rowCount = $query->rowCount();

    if(empty($rowCount)) {
        echo "<p>ошибка оформления заказа 3</p>";
        $err = $query->errorInfo();
        var_dump($err);
        exit();
    } else {
        $id_order = $pdo->lastInsertId();
        //выводим сообщение пользователю
        echo "<p>Спасибо, ваш заказ будет доставлен по адресу: $adress <br>
        Номер вашего заказа: $id_order <br>
        Это ваш $count-й заказ!</p>";
    }

}

echo '</body></html>';
