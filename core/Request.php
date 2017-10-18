<?php

namespace core;

class Request
{
    public $controller = 'main';
    public $action = 'index';
    public $namespaceController = 'controllers';


    public function init()
    {
       $uri = $_SERVER['PATH_INFO'];

        $path = explode('/', $uri);


        if(!empty($path[1])){
            $this->controller = $path[1];
        }

        if(!empty($path[2])){
            $this->action = $path[2];
        }

        $this->callController();
    }

    protected function callController()
    {
//        echo 'Контроллер: '.$this->controller.'<br>';
//        echo 'Action: '.$this->action.'<br>';

        $classController = $this->namespaceController . '\\' . ucwords($this->controller) . 'Controller';
        $actionMethod = 'action' . ucwords($this->action);

        if(class_exists($classController)){
            $controllerInstance = new $classController;
        } else {
            echo 'Класса контроллера не существует!';
            exit(1);
        }

        if(method_exists($controllerInstance, $actionMethod)){
            call_user_func_array([$controllerInstance, $actionMethod], []);
        } else {
            echo 'Метод контроллера не существует!';
            exit(1);
        }

    }
}