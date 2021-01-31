<?php

namespace App\Controller;

use App\Model\User as UserModel;
use Core\AbstractController;

class User extends AbstractController
{

    public function loginAction()
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if ($email) {
            $user = UserModel::getByEmail($email);
            if (!$user) {
                $this->view->assign('error', 'не верный логин или пароль');
            } else {
                if ($user->getPassword() != UserModel::getPasswordHash($password)) {
                    $this->view->assign('error', 'не верный логин или пароль');
                }
                $_SESSION['id'] = $user->getId();
                //
                //$this->setUser($user);

                $this->redirect('/');
            }
        }
        return $this->view->render('User/register.phtml', [

        ]);
    }

    public function registerAction() {

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];


        if (!$name || !$email || !$password || !$password2) {
            $this->view->assign('error', 'не все поля заполнены');
        } else {
            // проверяем что пароли совпадают
            if ($password2 != $password) {
                $this->view->assign('error', 'пароли не совпадают');
            } else {
                // проверка что пользователя с таким емейл нет
                $userMail = UserModel::getByEmail($email);
                if ($userMail) {
                    $this->view->assign('error', 'этот емейл уже зарегистрирован');
                } else {
                    $user = new UserModel();
                    $user->setName($name)
                        ->setEmail($email)
                        ->setPassword(UserModel::getPasswordHash($password));

                    $user->save();

                    // проверка что пользователь создан
                    $userMail = UserModel::getByEmail($email);
                    if($userMail) {
                        $_SESSION['id'] = $user->getId();
                        $this->setUser($user);

                        $this->redirect('/');
                    } else {
                        $this->view->assign('error', 'ошибка создания пользователя');
                    }
                }

            }
        }
        return $this->view->render('User/register.phtml', [

        ]);
    }


    // получение данных пользователя
    public function profileAction()
    {
        return $this->view->render('User/profile.phtml', [
            'user' => UserModel::getById((int) $_GET['id'])
        ]);
    }

    public function logoutAction()
    {
        session_destroy();

        $this->redirect('/');
    }
}
