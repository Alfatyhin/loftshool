<?php
namespace App\Controller;

use App\Model\Message;
use Core\AbstractController;
use Core\Application;


class Blog extends AbstractController
{

    public function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/login');
        }


        // получаем записи
        $blogMessages = Message::getMessages(20);

        return $this->view->render('Blog/index.phtml', [
            'user' => $this->user,
            'blogMessages' => $blogMessages
        ]);
    }

    public function saveAction()
    {
        if ($_POST['message_text']) {
            // test values
            $userId = $this->user->getId();
            $text = $_POST['message_text'];

            // прикрепляем картинку к посту
            if (isset($_FILES['photo']['tmp_name'])) {

                $filename = Application::randNameFile($_FILES['photo']['name'],PROGECT_LOAD_DIR . "images/");

                if (move_uploaded_file($_FILES['photo']['tmp_name'], PROGECT_LOAD_DIR . "images/$filename")) {

                } else {
                    $this->view->assign('error','file not loaded');
                }
            }

            // create object message
            $message = new Message();
            $message->setText($text)
                ->setImage($filename)
                ->setUseId($userId);

            // model save to db
            $message->save();

            $this->redirect('/blog');

        } else {
            $this->view->assign('error', 'сообщение не может быть пустым');
        }

        return $this->view->render('Blog/index.phtml', [
            'user' => $this->user,
            'message' => $message
        ]);
    }

    // удаление записи
    public function deleteAction()
    {
        // id to delete
        $delId = $_POST['post_id'];

        // проверка админ прав
        if (PROGECT_ADMINS[$this->user->getId()]) {
            $return = Message::deleteMessage($delId);

            if ($return) {

                $this->redirect('/blog');
            } else {
                $this->view->assign('error',
                    "чтото пошло не так, сообщение не удалено <a href='/blog'> перейти в блог </a>");
            }

        }

        return $this->view->render('Blog/index.phtml', [
        ]);
    }

}
