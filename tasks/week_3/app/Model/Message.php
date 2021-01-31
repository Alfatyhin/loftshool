<?php
namespace App\Model;

use Core\AbstractModel;
use Core\Db;

/* функционал который надо реализовать
 * создает модель сообщения
 * записывает сообщение в базу
 */

class Message extends AbstractModel
{
    private $id;
    private $text;
    private $createDate;
    private $useId;


    // конструктор модели сообщения
    // заполняется в контроллере Blog
    public function __construct($data = [])
    {
        if ($data) {
            $this->id = $data['id'];
            $this->useId = $data['user_id'];
            $this->text = $data['message_text'];
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
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->createDate;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): self
    {
        $this->createDate = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUseId()
    {
        return $this->useId;
    }

    /**
     * @param mixed $useId
     */
    public function setUseId($useId): self
    {
        $this->useId = $useId;
        return $this;
    }

    // сохраняем сообщение в базу
    public function save()
    {
        $db = Db::getInstance();
        $insert = "INSERT INTO blog (`user_id`, `message_text`, `create_date`) VALUES (
        :user_id, :message_text , :date
        )";
        $db->exec($insert, __METHOD__, [
            ':user_id' => $this->useId,
            ':message_text' => $this->text,
            ':date' => Date('Y-m-d H:i:s')
        ]);

        $id = $db->lastInsertId();
        $this->id = $id;

        return $id;
    }

    // получаем сообщения из базы
    public static function getMessages($count)
    {
        $db = Db::getInstance();
        $select = "SELECT * FROM (SELECT * FROM blog ORDER BY id DESC LIMIT $count) t ORDER BY id";
        $data = $db->fetchAll($select, __METHOD__);

        if (!$data) {
            return null;
        }

        return $data;
    }

}
