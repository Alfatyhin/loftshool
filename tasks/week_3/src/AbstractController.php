<?php
namespace Core;

use App\Model\User;

abstract class AbstractController
{
    /** @var View */
    protected $view;
    /** @var User */
    protected $user;

    protected function redirect(string $url)
    {
        throw new RedirectExeption($url);
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
        echo "this inexAction";
    }


}
