<?php

use Core\Application;
use Core\Capsule;

include '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config.php';
include '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$db = new Capsule();

$app = new Application();
$app->run();

