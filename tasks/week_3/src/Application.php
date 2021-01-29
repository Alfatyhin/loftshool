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
            $this->addRoutes();
            $this->initController();
            $this->initAction();

            $view = new View();
            $this->controller->setView($view);


            $content = $this->controller->{$this->actionName}();

            echo $content;

        } catch (RedirectExeption $e) {
            header('Location: ' . $e->getUrl());
        } catch (RouteExeption $e) {
            header('HTTP/1.0 404 Not Found');
            echo $e->getMessage();
        }
    }

    private function addRoutes()
    {
        ///** @uses \App\Controller\User::loginAction() */
        //$this->route->addRoute('/user/', \App\Controller\User::class, 'index');
        ///** @uses \App\Controller\User::registerAction() */
        //$this->route->addRoute('/user/register', \App\Controller\User::class, 'register');
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
            throw new RouteExeption('Action \'' . $actionName . '\' not found in ' . get_class($this->controller));
        }

        $this->actionName = $actionName;
    }
}
