<?php
namespace App\Controller;

use Core\AbstractController;
use Core\RedirectExeption;

class Admin extends AbstractController
{

    public function preDispatch()
    {
        parent::preDispatch();
        if(!$this->getUser() || !$this->getUser()->isAdmin()) {
            throw new RedirectExeption('/notfound');
        }
    }
}
