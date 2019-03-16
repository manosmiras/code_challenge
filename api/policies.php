<?php
	include_once '../config/database.php';
	include_once '../entities/resource.php';
	include_once '../entities/policy_entity.php';
	$database = new Database();
	$db = $database->getConnection();
	$policy = new Policy($db);
	request($policy, "policies", $db);
?>