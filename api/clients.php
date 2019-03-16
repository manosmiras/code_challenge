<?php
	include_once '../config/database.php';
	include_once '../entities/resource.php';
	include_once '../entities/client_entity.php';
	$database = new Database();
	$db = $database->getConnection();
	$client = new Client($db);
	request($client, "clients");
?>