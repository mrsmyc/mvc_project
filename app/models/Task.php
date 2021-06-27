<?php

namespace app\models;

use app\core\Model;

class Task extends Model {

    public function getTasks($offset, $pageSize, $sort, $sortOrder) {
        if($sort) {
            $sql = "SELECT * FROM tasks ORDER BY $sort $sortOrder LIMIT $offset,$pageSize";  
        }else {
            $sql = "SELECT * FROM tasks LIMIT $offset,$pageSize";
        }
        $result = $this->db->row($sql);        
        return $result;
    }

    public function add($data) {
        $data = $this->validateData($data);
        if(isset($data['errors'])) {
            return $data;
        }else {
            $sql = "INSERT INTO tasks (email, name, text) VALUES (" . "'" . $data['email'] . "'" . "," . "'" . $data['name'] . "'" . "," . "'" . $data['text'] . "'" . ")";
            $result = $this->db->add($sql);
            $data['success'] = 'Задача успешно добавлена';
            return $data;        
        }        
    }

    public function update($data) {
        if(isset($data['done'])) {
            $doneValue = $data['done'];
        }else {
            $doneValue = 0;
        }
        $sql = "UPDATE tasks SET text=" . "'" . $data['text'] . "'," . "done=" . "'" . $doneValue . "'," . "redacted=" . "'" . $data['redacted'] . "'" . "WHERE Id=" . $data['id'];
        $result = $this->db->update($sql);
    }

    public function get($id) {
        $sql = "SELECT * FROM tasks WHERE id=" . $id;
        $result = $this->db->row($sql);        
        return $result;
    }

    public function validateData($data) {
        if(empty($data['email'])) {
            $data['errors']['empty_email'] = 'Поле email необходимо заполнить.';
        }elseif(!preg_match("/[0-9a-z]+@[a-z]/", $data['email'])) {
            $data['errors']['not_valid_email'] = 'Поле email заполнено некорректно.';
        }
        if(empty($data['name'])) {
            $data['errors']['empty_name'] = 'Поле Имя необходимо заполнить.';
        }
        if(empty($data['text'])) {
            $data['errors']['empty_text'] = 'Поле Текст необходимо заполнить.';
        }
        return $data;
    }

}