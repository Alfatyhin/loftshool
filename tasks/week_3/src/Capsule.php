<?php
namespace Core;

use Illuminate\Database\Capsule\Manager;

class Capsule extends Manager
{

    public function __construct()
    {
            $capsule = new Manager;

            $capsule->addConnection([
                'driver' => 'mysql',
                'host' => DB_HOST,
                'database' => DB_NAME,
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]);

            $capsule->bootEloquent();
            $capsule->setAsGlobal();
            $capsule->getConnection()->enableQueryLog();
    }

    public static function printLog()
    {
        echo '<pre>';
        $log = Capsule::connection()->getQueryLog();
        foreach ($log as $elem) {
            echo 'Db :' . 0.01 * $elem['time'] . ': ' . $elem['query'] . ' bind: ' . json_encode($elem['bindings']) . '<br>';
        }
        echo '</pre>';
    }


}