<?php
	include_once '../config/database.php';
	include_once '../entities/resource.php';
	include_once '../entities/customer_entity.php';
	$database = new Database();
	$db = $database->getConnection();
	$customer = new Customer($db);
	request($customer, "customers", $db);
?>