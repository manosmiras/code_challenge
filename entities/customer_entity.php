<?php
	include_once '../entities/entity.php';
    class Customer extends Entity{
        public $table_name = "customer";

        // object properties
        public $id;
        public $name;
        public $address;
		public $values;
        // constructor with $db as database connection
        public function __construct($db){
		    $this->conn = $db;
			// query to get record
			$this->get_query = "SELECT id, name, address
                    FROM " . $this->table_name;
			// query to insert record
			$this->set_query = "INSERT INTO " . $this->table_name . " (name, address) VALUES ";
        }

		public function check_empty($data){
			return (!empty($data->name) && !empty($data->address));
		}

		public function set_values($data){
			$name = htmlspecialchars(strip_tags($data->name));
			$address = htmlspecialchars(strip_tags($data->address));
			
			$this->set_query .= "('" . $name ."','". $address ."')";
		}

    }
?>