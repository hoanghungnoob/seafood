<?php
class App {
    private $__controller, $__action, $__params;

    public function __construct() {
        global $routes;
        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = 'index';
        $this->__params = [];
        $this->handleUrl();
    }

    public function getUrl() {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl() {
        $url = $this->getUrl();
        $urlArr = array_filter(explode('/', $url));

        // Remove "controllers" from the array
        $urlArr = array_values(array_diff($urlArr, ['controllers']));
 
        // Handle controller
        if (!empty($urlArr[0])) {
            $this->__controller = $urlArr[0];
            if (file_exists('controllers/'.$this->__controller.'controller.php')) {
                
                require_once 'controllers/'.$this->__controller.'controller.php';
                // $this->__controller = new $this->__controller();
                // $this->__controller->index();
            } else {
                echo '404 Not Found'; // page 404
                return;
            }
            // handle action param
        } else {
            // page default 
            global $routes;
            $this->__controller = $routes['default_controller'];
            
            require_once "controllers/homecontroller.php";
            // $this->__controller = new $this->__controller();
            // $this->__controller->index();
        }
    }
    
}

