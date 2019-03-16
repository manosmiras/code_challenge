<?php
	function request($object, $name){

		$request_method=$_SERVER["REQUEST_METHOD"];

		switch($request_method)
		{
			// TODO: GET PUT DELETE and such
			case 'GET':
				// Retrieve resource
				if(!empty($_GET["id"]))
				{
					// $id=intval($_GET["id"]);
					// get_policies($id);
				}
				else
				{
					get($object, $name);
				}
				break;
			default:
				// Invalid Request Method
				header("HTTP/1.0 405 Method Not Allowed");
				break;
		}
	}

	function get($object, $name){
		$stmt = $object->read();
		$num = $stmt->rowCount();
		// check if more than 0 record found
		if($num>0){
			// object array
			$object_arr=array();
			$object_arr[$name]=array();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($object_arr[$name], $row);
			}
    
			// set response code - 200 OK
			http_response_code(200);
    
			// show object data in json format
			echo json_encode($object_arr, JSON_PRETTY_PRINT);
		}
		else{
    
			// set response code - 404 Not found
			http_response_code(404);
    
			// tell the user no policies found
			echo json_encode(
				array("message" => "No policies found.")
			);
		}
	}
?>