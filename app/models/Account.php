<?php

namespace app\models;

use app\core\Model;

class Account extends Model {

    public function login($data) {
        $data = $this->validateData($data);        
        if(isset($data['errors'])) {
            return $data;
        }else {
            $sql = "SELECT * FROM users WHERE login=" . "'" . $data['login'] . "'" . "AND password=" . "'" . $data['password'] . "'";
            $result = $this->db->row($sql);
            if(empty($result)) {
                $result['errors']['incorrect_props'] = 'Неверный логин или пароль';
                return $result;
            }else {
                return $result;
            }        
        } 
    }

    public function validateData($data) {
        if(empty($data['login'])) {
            $data['errors']['empty_login'] = 'Поле Логин необходимо заполнить.';
        }
        if(empty($data['password'])) {
            $data['errors']['empty_password'] = 'Поле Пароль необходимо заполнить.';
        }
        return $data;
    }

}