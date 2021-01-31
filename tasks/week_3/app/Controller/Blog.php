<?php
namespace App\Controller;

use App\Model\Message;
use App\Model\User as UserModel;
use Core\AbstractController;


class Blog extends AbstractController
{

    public function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/login');
        }
        //$message = new Message();

        // получаем записи
        $blogMessages = Message::getMessages(20);

        return $this->view->render('Blog/index.phtml', [
            'user' => $this->user,
            'blogMessages' => $blogMessages
        ]);
    }

    public function saveAction()
    {
        // test values
        $userId = rand(1, 6);
        $text = $_POST['message_text'];

        // create object message
        $message = new Message();
        $message->setText($text)
        ->setUseId($userId);

        // model save to db
        $message->save();

        return $this->view->render('Blog/index.phtml', [
            'user' => $this->user,
            'message' => $message
        ]);
    }

}
