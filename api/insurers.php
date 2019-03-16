<?php
	include_once '../config/database.php';
	include_once '../entities/resource.php';
	include_once '../entities/insurer_entity.php';
	$database = new Database();
	$db = $database->getConnection();
	$insurer = new Insurer($db);
	request($insurer, "insurers", $db);
?>