<?php
namespace Core;

use App\Model\User;

abstract class AbstractController
{
    /** @var View */
    protected $view;
    /** @var User */
    protected $user;
    /** @var Session */
    protected $session;

    public $tpl;

    protected function redirect(string $url)
    {
        throw new RedirectExeption($url);
    }
    public function getUser(): ?User
    {
        $userId = $this->session->getValue('id');
        if (!$userId) {
            return null;
        }

        $user = User::getById($userId);
        if (!$user) {
            return null;
        }

        return $user;
    }
    public function setView(View $view)
    {
        $this->view = $view;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function indexAction()
    {

    }

    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    public function preAction()
    {

    }
    public function preDispatch()
    {
        if ($this->getUser()) {
            $this->view->assign([
                'user' => $this->getUser()
            ]);
        }
    }

}
