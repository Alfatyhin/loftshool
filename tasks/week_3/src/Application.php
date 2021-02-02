<?php

namespace Core;

class Application
{
    private $route;
    /** @var AbstractController */
    private $controller;
    private $actionName;

    public function __construct()
    {
        $this->route = new Route();
    }

    public function run()
    {
        try {
            session_start();
            $this->addRoutes();
            $this->initController();
            $this->initAction();

            $view = new View();
            $this->controller->setView($view);
            $this->initUser();


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
        $id = $_SESSION['id'] ?? null;
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
        /** @uses \App\Controller\User::registerUser() */
        $this->route->addRoute('/user/registeruser', \App\Controller\User::class, 'registerUser');
    }

    private function initController()
    {
        $controllerName = $this->route->getControllerName();
        if (!class_exists($controllerName)) {
            throw new RouteExeption('Cant find controller ' . $controllerName);
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
