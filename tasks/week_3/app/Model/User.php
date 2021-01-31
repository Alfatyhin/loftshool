<?php
namespace App\Model;

use Core\AbstractModel;
use Core\Db;

class User extends AbstractModel
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE =2;

    private $id;
    private $name;
    private $password;
    private $createDate;
    private $email;

    public function __construct($data = [])
    {
        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->password = $data['password'];
            $this->email = $data['email'];
            $this->createDate = $data['create_date'];
        }
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

    public function save()
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO users (`name`, `password`, `email`, `create_date`) VALUES (
        :name, :password, :email, :date
        )";
        $db->exec($insert, __METHOD__, [
            ':name' => $this->name,
            ':password' => $this->password,
            ':email' => $this->email,
            ':date' => Date('Y-m-d H:i:s')
        ]);

        $id = $db->lastInsertId();
        $this->id = $id;

        return $id;
    }

    public static function getByEmail(string $email): ? self
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM users Where email = :email";

        $data = $db->fetchOne($select, __METHOD__, [
            ':email' => $email
        ]);

        if (!$data) {
            return null;
        }

        return new self($data);
    }

    public static function getById(int $id): ? self
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM users Where id = $id";
        $data = $db->fetchOne($select, __METHOD__);

        if (!$data) {
            return null;
        }

        return new self($data);
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('sj463hncndj@@' .$password);
    }


}
