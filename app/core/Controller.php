<?php

namespace app\core;

use app\core\View;


abstract class Controller {

    public $route;
    public $view;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        session_start();
    }

    public function loadModel($modelName) {
        $path = 'app\models\\' . ucfirst($modelName);        
        if(class_exists($path)) {            
            return new $path;
        }
    }

    public function getPaginationData($pageSize) {
        if(isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        }else {
            $pageno = 1;
        }        
        $offset = ($pageno-1) * $pageSize;
        $paginationData = [
            'offset' => $offset,
            'pageno' => $pageno,
        ];
        return $paginationData;
    }

    public function checkRole($role) {
        if($_COOKIE['user_role'] == $role){
            return true;
        }else {
            return false;
        }
    }
}