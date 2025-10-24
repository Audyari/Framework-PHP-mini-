<?php

class User {

    private $_db;
    public $name;
    public $age;

    public function __construct() {
        $this->_db = Database::getInstance();
    }

    public function index() {
        return $this->_db->index("users");
    }

    public function getAllUser() {
      return $this->_db->getAllUser("users");
    }
}