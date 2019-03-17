<?php
    class Entity{
        // database connection and table name
		public $id;
        public $conn;
		public $get_query;
		public $set_query;
        function read()
        {
            // prepare query statement
            $stmt = $this->conn->prepare($this->get_query);

            // execute query
            $stmt->execute();

            return $stmt;
        }

		// create product
		function create(){
			// prepare query
			$stmt = $this->conn->prepare($this->set_query);
			
			// execute query
			if($stmt->execute()){
				return true;
			}
			$stmt->debugDumpParams();
			return false;
     
		}

		// delete the product
		function delete(){
 
			// delete query
			$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
			// prepare query
			$stmt = $this->conn->prepare($query);
 
			// sanitize
			$this->id=htmlspecialchars(strip_tags($this->id));
 
			// bind id of record to delete
			$stmt->bindParam(1, $this->id);
 
			// execute query
			if($stmt->execute()){
				return true;
			}
 
			return false;
     
		}
    }
?>