<?php
namespace App\Controller;

use Core\AbstractController;

class Index extends AbstractController
{
    private $homePage = 'index.phtml';

    public function indexAction()
    {

        return $this->view->render($this->homePage, [
            'user' => $this->user
        ]);
    }

    public function notFoundAction()
    {
        return $this->view->render('notfound.phtml', [

        ]);
    }
}