<?php
include_once '../entities/entity.php';
    class Policy extends Entity{
        private $table_name = "policy";

        // object properties
        public $id;
        public $customer_name;
        public $customer_address;
        public $premium;
        public $policy_type;
        public $insurer_name;

        // constructor with $db as database connection
        public function __construct($db){
		// select all query
            $this->query = "SELECT policy.id, premium, customer.name AS customer_name, customer.address AS customer_address, 
						policy_type.name AS policy_type, insurer.name AS insurer_name, client.name AS client_name
						FROM " . $this->table_name . 
						" INNER JOIN customer ON customer_id=customer.id
						  INNER JOIN policy_type ON policy_type_id=policy_type.id
						  INNER JOIN insurer ON insurer_id=insurer.id
						  INNER JOIN client ON client_id=client.id";
            $this->conn = $db;
        }
    }
?>