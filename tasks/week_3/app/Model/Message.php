<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/* функционал который надо реализовать
 * создает модель сообщения
 * записывает сообщение в базу
 */

class Message extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'content',
        'user_id',
        'image',
    ];


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
        return $this->content;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): self
    {
        $this->content = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUseId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $useId
     */
    public function setUseId($useId): self
    {
        $this->user_id = $useId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): self
    {
        $this->image = $image;
        return $this;
    }



    // получаем сообщения из базы
    public static function getMessages($count, $id)
    {
        if ($id != 0) {
            return self::latest('id')->where('id', '<', $id)->take($count)->get()->toArray();
        } else {
            return self::latest('id')->take($count)->get()->toArray();
        }
    }

    // получаем сообщения пользователя из базы
    public static function getUserMessages(int $userId, int $limit)
    {
       return self::latest('id')->where('user_id', '=', $userId)->take($limit)->get()->toArray();;
    }

    // функция удаления сообщения
    public static function deleteMessage($id)
    {
        return self::destroy($id);
    }


}
