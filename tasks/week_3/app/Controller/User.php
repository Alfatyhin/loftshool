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
                //$this->view->assign('error', 'не верный логин или пароль');
            } else {
                if ($user->getPassword() != UserModel::getPasswordHash($password)) {
                    $this->view->assign('error', 'не верный логин или пароль');
                }
                $this->session->setValue('id', $user->getId());

                $this->redirect('/');
            }
        }
        return $this->view->render('User/login.phtml', [

        ]);
    }

    public function registerUserAction()
    {
        if ($_POST) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $password2 = $_POST['password2'];


            if (!$name || !$email || !$password || !$password2) {
                $this->view->assign('error', 'не все поля заполнены');
            } else {
                // проверяем что пароли совпадают
                if (mb_strlen($password) < 5) {
                    $this->view->assign('error', 'пароль слишком короткий');
                } elseif ($password2 != $password) {
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
                        if ($userMail) {
                            $this->setUser($user);

                            $this->view->assign('error', 'Вы успешно зарегистрировалисть');
                            return $this->view->render('User/login.phtml', [

                            ]);
                        } else {
                            $this->view->assign('error', 'ошибка создания пользователя');
                        }
                    }

                }
            }
            return $this->view->render('User/register.phtml', [

            ]);
        } else {
            $this->redirect('User/register.phtml');
        }
    }

    public function registerAction() {

        return $this->view->render('User/register.phtml', [

        ]);
    }


    // получение данных пользователя
    public function profileAction()
    {
        if(!$_GET['id'] && $this->user) {
            $user = $this->user;
        } elseif ($this->user && $_GET['id']) {
            $user = UserModel::getById((int) $_GET['id']);
        }

        return $this->view->render('User/profile.phtml', [
            'user' => $user
        ]);
    }

    public function logoutAction()
    {
        $this->session->destroy();

        $this->redirect('/');
    }
}
