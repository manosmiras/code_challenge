<?php
	include_once '../config/database.php';
	include_once '../entities/resource.php';
	include_once '../entities/policy_type_entity.php';
	$database = new Database();
	$db = $database->getConnection();
	$policy_type = new PolicyType($db);
	request($policy_type, "policy_types", $db);
?>