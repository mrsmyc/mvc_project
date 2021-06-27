<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class TaskController extends Controller {

    public $pageSize;

    public function indexAction() {
        
        $sort = '';
        $sortOrder = '';
        $pageSize = 3;
        $paginationData = $this->getPaginationData($pageSize);
        if(isset($_GET['sort']) && isset($_GET['order'])) {
            $sort = $_GET['sort'];
            $sortOrder = $_GET['order'];
        }
        $result = $this->model->getTasks($paginationData['offset'], $pageSize, $sort, $sortOrder);
        $totalPages = $this->model->countTable('tasks', $pageSize);
        $data = [
            'tasks' => $result,
            'totalPages' => $totalPages,
            'pageno' => $paginationData['pageno'],
        ];        
        $this->view->render('Главная', $data);
    }
    
    public function addAction() {        
        if(!empty($_POST)) {
            $data = $_POST;
            $data['name'] = htmlspecialchars($data['name'], ENT_QUOTES);
            $data['text'] = htmlspecialchars($data['text'], ENT_QUOTES);
            $data = $this->model->add($data);

            $this->view->render('Добавить задачу', $data);                    
        }else{
            $this->view->render('Добавить задачу');
        }
    }

    public function editAction() {
        if(isset($_GET['id']) && $this->checkRole('admin')) {            
            $result = $this->model->get($_GET['id']);
            if($_POST) {
                $data = $_POST;
                $data['text'] = htmlspecialchars($data['text'], ENT_QUOTES);
                $data['redacted'] = 1;
                $data = $this->model->update($data);
                $result = $this->model->get($_GET['id']);
                $this->view->render('Редактировать задачу', $result);                        
            }else{
                $this->view->render('Редактировать задачу', $result);                        
            }            
        }else {
            $this->view->redirect('/login');
        }
    }

}