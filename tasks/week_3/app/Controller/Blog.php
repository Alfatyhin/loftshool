<?php
namespace App\Controller;

use App\Model\Message;
use Core\AbstractController;
use Core\RandNameFile as RandNameFileAlias;


class Blog extends AbstractController
{

    public function indexAction()
    {
        if (!$this->user) {
            $this->redirect('/user/login');
        }

        $id = 0;
        $back = [];

        if ($_POST['before']) {
            $back = $_POST['back'];
            $id = $_POST['before'];
        }
        if ($_POST['next']) {
            $back = $_POST['back'];
            array_shift($back);
            $id = $back[0] + 1;
            array_shift($back);
        }

        // получаем записи
        $count = 5; // кол-во записей по дефолту
        // count + 1 делается для того чтобы знать можно ли показывать кнопку листания назад
        $blogMessages = Message::getMessages($count + 1, $id);

        $blogMessages = array_reverse($blogMessages);
        // изображения в серой гамме
        if ($_GET['grey']) {
            // проверяем наличие серого варианта изображения
            foreach ($blogMessages as $k => $message) {
                $image = $message['image'];
                if ($image) {
                    $image = Images::greyCreatOnce($image);
                    $blogMessages[$k]['image'] = $image;
                }
            }
        }

        return $this->view->render('Blog/index.phtml', [
            'user' => $this->user,
            'blogMessages' => $blogMessages,
            'back' => $back,
            'count' => $count
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

                $filename = new RandNameFileAlias($_FILES['photo']['name']);
                $filename = $filename->generateName();

                if (move_uploaded_file($_FILES['photo']['tmp_name'], PROGECT_LOAD_DIR . "images/$filename")) {
                    Images::loadResize($filename);
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
