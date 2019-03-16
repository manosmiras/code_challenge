<?php
    class Entity{
        // database connection and table name
        public $conn;

        function read()
        {
            // prepare query statement
            $stmt = $this->conn->prepare($this->query);

            // execute query
            $stmt->execute();

            return $stmt;
        }
    }
?>