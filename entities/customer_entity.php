<?php
	include_once '../entities/entity.php';
    class Customer extends Entity{
        private $table_name = "customer";

        // object properties
        public $id;
        public $name;
        public $address;

        // constructor with $db as database connection
        public function __construct($db){
			$this->query = "SELECT id, name, address
                    FROM " . $this->table_name;
            $this->conn = $db;
        }
    }
?>