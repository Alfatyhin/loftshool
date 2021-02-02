<?php
namespace App\Controller;
use App\Model\Message;
use Core\AbstractController;

class Api extends AbstractController
{
    public function getUserMessagesAction()
    {
        $userId =(int) $_GET['user_id'] ?? 0;

        if (!$userId) {
            return $this->response(['error' => 'no user Id']);
        }

        $messages = Message::getUserMessages($userId, 20);
        //var_dump($messages);

        if (!$messages) {
            return $this->response(['error' => 'no message']);
        }

        $data = array_map(function ($message) {
           $message = new Message($message);

           return $message->getData();
        }, $messages);

        return $this->response(['messages' => $data]);
    }

    // возвращение результата
    public function response(array $data)
    {
        header('Content-type: application/json');
        return json_encode($data);
    }
}
