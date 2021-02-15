<?php

use Illuminate\Database\Capsule\Manager as Capsule;


include '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'config.php';
require '../../vendor/autoload.php';

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host'  => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASSWORD,
    'charset'  => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->getConnection()->enableQueryLog();

class User extends Illuminate\Database\Eloquent\Model
{
    public $table = "users";
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'password', 'info'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено

    public function posts()
    {
        // users.id == posts.user_id
        return $this->hasMany('Post', 'user_id', 'id');
    }
}

class Post extends Illuminate\Database\Eloquent\Model
{

    public function userdata()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

function printLog()
{
    echo '<pre>';
    $log = Capsule::connection()->getQueryLog();
    foreach ($log as $elem) {
        echo $name . ':' . 0.01 * $elem['time'] . ': ' . $elem['query'] . ' bind: ' . json_encode($elem['bindings']) . '<br>';
    }
    echo '</pre>';
}

include 'menu.php';