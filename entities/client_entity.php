<?php
	include_once '../entities/entity.php';
    class Client extends Entity{
        private $table_name = "client";
        // object properties
        public $id;
        public $name;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
		    $this->query = "SELECT id, name FROM " . $this->table_name;
        }
    }
?>