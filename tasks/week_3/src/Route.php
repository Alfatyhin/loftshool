<?php
namespace Core;

class Route
{
    private $controllerName;
    private $actionName;
    private $processed = false;
    private $routs;

    private function process()
    {
        $parse = parse_url($_SERVER['REQUEST_URI']);
        $path = $parse['path'];

        if (($route = $this->routs[$path] ?? null) !== null) {
            $this->controllerName = $route[0];
            $this->actionName = $route[1];
        } else {
            $parts = explode('/', $path);

            $this->controllerName = '\\App\\Controller\\' . ucfirst(strtolower($parts[1]));
            $this->actionName = strtolower($parts[2] ?? 'index');
            if ($this->actionName == '') {
                $this->actionName = 'index';
            }

            if (!class_exists($this->controllerName)) {
                throw new RouteExeption('Cant find controller' . $this->controllerName);
            }

        }

   /*     switch ($parse['path']) {

            case '/user/login':
                $controller = new \App\Controller\User();
                $controller->loginAction();
                break;
            case '/user/register':
                $controller = new \App\Controller\User();
                $controller->registerAction();
                break;
            case '':
                echo "<h1> Hello World</h1>";
                break;
            default:
                header("HTTP/1.0 404 Not Found");
                break;

        }*/
    }

    public function addRoute($path, $controllerName, $actionName)
    {
        $this->routs[$path] = [
            $controllerName,
            $actionName
        ];
    }

    public function getControllerName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        if (!$this->processed) {
            $this->process();
        }
        return $this->actionName . 'Action';
    }
}
