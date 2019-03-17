<?php
include_once '../entities/entity.php';
    class PolicyType extends Entity{
        public $table_name = "policy_type";

        // object properties
        public $id;
        public $name;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
			$this->get_query = "SELECT id, name FROM " . $this->table_name;
			// query to insert record
			$this->set_query = "INSERT INTO " . $this->table_name . "(name) VALUES ";
        }

		public function check_empty($data){
			return (!empty($data->name));
		}

		public function set_values($data){
			$name = htmlspecialchars(strip_tags($data->name));
			$this->set_query .= "('" . $name ."')";
		}
    }
?>