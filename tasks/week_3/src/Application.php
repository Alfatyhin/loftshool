<?php

namespace Core;

class Application
{
    private $route;
    /** @var AbstractController */
    private $controller;
    private $actionName;
    private $session;

    public function __construct()
    {
        $this->route = new Route();
    }

    public function run()
    {
        try {
            $session = new Session();
            $session->init();
            $this->addRoutes();
            $this->initController();
            $this->initAction();

            $view = new View();
            $this->controller->setView($view);
            $this->controller->setSession($session);
            $this->initUser();
            $session->setValue('test', '123');

            $content = $this->controller->{$this->actionName}();

            echo $content;

        } catch (RedirectExeption $e) {
            header('Location: ' . $e->getUrl());
        } catch (RouteExeption $e) {
            header('HTTP/1.0 404 Not Found');
            echo $e->getMessage();
        }
    }

    private function initUser()
    {
        $session = new Session();
        $id = $session->getValue('id');
        if ($id) {
            $user = \App\Model\User::getById($id);
            if ($user) {
                $this->controller->setUser($user);
            }
        }
    }

    private function addRoutes()
    {
        /** @uses \App\Controller\User::loginAction() */
        $this->route->addRoute('', \App\Controller\Index::class, 'index');
        /** @uses \App\Controller\User::registerUserAction() */
        $this->route->addRoute('/user/registeruser', \App\Controller\User::class, 'registerUser');
        /** @uses \App\Controller\Api::getUserMessagesAction() */
        $this->route->addRoute('/api/getusermessages', \App\Controller\Api::class, 'getUserMessages');
       /** @uses \App\Controller\Index::notFound */
        $this->route->addRoute('/notfound', \App\Controller\Index::class, 'notFound');


    }

    private function initController()
    {
        $controllerName = $this->route->getControllerName();
        if (!class_exists($controllerName)) {
            throw new RedirectExeption('/notfound');
        }

        $this->controller = new $controllerName();
    }

    private function initAction()
    {
        $actionName = $this->route->getActionName();
        if (!method_exists($this->controller, $actionName)) {
            throw new RouteExeption('Action [' . $actionName . '] not found in ' . get_class($this->controller));
        }

        $this->actionName = $actionName;
    }

}
