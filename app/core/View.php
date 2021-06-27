<?php

namespace app\core;

class View {

    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $data = []) {
        extract($data);
        $path = 'app/views/' . $this->path . '.php';
        if(file_exists($path)) {
            ob_start();
            require $path; 
            $data = ob_get_clean();
            require 'app/views/layouts/' . $this->layout . '.php';
        }else {
            echo 'No view';
        }
        
    }

    public function redirect($url) {
        header('location: ' . $url);
        exit;
    }

    public static function error($type) {
        http_response_code($type);
        $path = 'app/views/errors/' . $type . '.php';
        if(file_exists($path)) {
            require $path;
        }
        exit;
    } 

    
}