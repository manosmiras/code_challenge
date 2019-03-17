<?php
include_once '../entities/entity.php';
    class Policy extends Entity{
        public $table_name = "policy";
        // object properties
        public $id;
        public $customer_name;
        public $customer_address;
        public $premium;
        public $policy_type;
        public $insurer_name;

        // constructor with $db as database connection
        public function __construct($db){
		    $this->conn = $db;
			// select all query
            $this->get_query = "SELECT policy.id, premium, customer.name AS customer_name, customer.address AS customer_address, 
						policy_type.name AS policy_type, insurer.name AS insurer_name
						FROM " . $this->table_name . 
						" INNER JOIN customer ON customer_id=customer.id
						  INNER JOIN policy_type ON policy_type_id=policy_type.id
						  INNER JOIN insurer ON insurer_id=insurer.id";
			// query to insert record
			$this->set_query = "INSERT INTO " . $this->table_name . " (customer_id, insurer_id, policy_type_id, premium) VALUES ";
		}
		public function check_empty($data){
			return (!empty($data->premium) 
			&& !empty($data->customer_id) 
			&& !empty($data->insurer_id)
			&& !empty($data->policy_type_id));
		}

		public function set_values($data){
			$customer_id = htmlspecialchars(strip_tags($data->customer_id));
			$insurer_id = htmlspecialchars(strip_tags($data->insurer_id));
			$policy_type_id = htmlspecialchars(strip_tags($data->policy_type_id));
			$premium = htmlspecialchars(strip_tags($data->premium));
			$this->set_query .= "(" . $customer_id .",". $insurer_id .",". $policy_type_id .",". $premium.")";
		}

    }
?>