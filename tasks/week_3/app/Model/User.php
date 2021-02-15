<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Core\RandNameFile as RandNameFileAlias;
use App\Controller\Images;

/**
 * Class User
 * @package App\Model\Eloquent
 *
 * @property-read $id
 * @property-read $password
 * @property-read $name
 */

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
            'name',
            'password',
            'email',
            'image',
    ];
    public static function getByEmail(string $email): ? self
    {
        return self::query()->where('email', '=', $email)->first();
    }

    public static function getById(int $id): ? self
    {
        return self::query()->find($id);
    }

    public static function getUsers()
    {
        return self::all()->toArray();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this;
    }

    /**
     * @param mixed $createDate
     */
    public function setCreateDate($createDate): self
    {
        $this->createDate = $createDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }


    public static function getPasswordHash(string $password)
    {
        return sha1('sj463hncndj@@' .$password);
    }


    public function resolveChildRouteBinding($childType, $value, $field)
    {
        // TODO: Implement resolveChildRouteBinding() method.
    }

    public function isAdmin(): bool
    {
        return in_array($this->id, PROGECT_ADMINS);
    }

    public function saveUser($data)
    {

        if (!empty($data['password'])) {
            if (mb_strlen($data['password']) < 5) {
                return "<span class='error'>пароль слишком короткий</span>";
            } else {
                $this->password = self::getPasswordHash($data['password']);
            }

        }
        if (empty($data['age'])) {
            $data['age'] = 18;
        }

        $emailUser = User::getByEmail($data['email']);

        if ($emailUser && $emailUser->id != $data['userId']) {
            return "<span class='error'>пользователь с таким email уже существует</span>";
        }

        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->info = $data['info'];
        $this->age = $data['age'];

        // прикрепляем картинку к посту
        if (!empty($_FILES['photo']['tmp_name'])) {

            $filename = new RandNameFileAlias($_FILES['photo']['name']);
            $filename = $filename->generateName();

            if (move_uploaded_file($_FILES['photo']['tmp_name'], PROGECT_LOAD_DIR . "images/$filename")) {
                Images::loadResize($filename);
                $this->image = $filename;
            } else {
                return "<span class='error'>file not loaded</span>";
            }
        }

        $this->save();

        return 'пользователь ' . $this->name . ' изименён.';
    }

    public function deleteUser()
    {
        if ($this->delete()) {
            return "<span style='color: #00dd00;'>пользователь {$_POST['name']} удалён</span>";
        } else {
            return "<span class='error'>ошибка удаления</span>";
        }
    }
}
