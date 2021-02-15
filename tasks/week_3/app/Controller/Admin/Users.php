<?php
namespace App\Controller\Admin;

use App\Controller\Admin;
use App\Model\User;

class Users extends Admin
{
    public function indexAction()
    {
        if (!empty($_POST['saveUser'])) {

            $id = $_POST['userId'];
            $user = User::getById($id);
            if ($user) {
                $message[] = $user->saveUser($_POST);
            } else {
                $message[] = 'пользователь не найден';
            }

        }
        if (!empty($_POST['createUser'])) {

            $user = new User();
            $message[] = $user->saveUser($_POST);

        }

        if (!empty($_POST['deleteUser'])) {

            $id = $_POST['userId'];
            $user = User::getById($id);
            if ($user) {
                $message[] = $user->deleteUser();
            } else {
                $message[] = 'пользователь не найден';
            }

        }


        return $this->view->render(
            'admin/users.phtml',
            [
                'user' => $this->user,
                'users' => User::getUsers(),
                'message' => $message
            ]
        );
    }


}
