<?php
	function request($object, $name){

		$request_method=$_SERVER["REQUEST_METHOD"];

		switch($request_method)
		{
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
			case 'POST':
				// Post resource
				set($object, $name);
				break;
			case 'DELETE':
				delete($object, $name);
				break;
			case 'OPTIONS':
				// Post resource
				set($object, $name);
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
				array("message" => "No " . $name . " found.")
			);
		}
	}

	function set($object, $name) {
		// get posted data
		$data = json_decode(file_get_contents("php://input"));
 
		// make sure data is not empty
		if($object->check_empty($data)){
			// set object property values
			$object->set_values($data);
			
			// create the product
			if($object->create()){
 
				// set response code - 201 created
				http_response_code(201);
 
				// tell the user
				echo json_encode(array("message" => "Entity was created on table " . $name));
			}
 
			// if unable to create the product, tell the user
			else{
 
				// set response code - 503 service unavailable
				http_response_code(503);
 
				// tell the user
				echo json_encode(array("message" => "Unable to create on table" . $name . "."));
			}
		}
 
		// tell the user data is incomplete
		else{
 
			// set response code - 400 bad request
			http_response_code(400);
 
			// tell the user
			echo json_encode(array("message" => "Unable to create on table " . $name . ". Data is incomplete."));
		}
	}

	function delete($object, $name) {

		// get entity id
		$data = json_decode(file_get_contents("php://input"));
 
		// set entity id to be deleted
		$object->id = $data->id;
 
		// delete the entity
		if($object->delete()){
 
			// set response code - 200 ok
			http_response_code(200);
 
			// tell the user
			echo json_encode(array("message" => "Entity was deleted from " . $name));
		}
 
		// if unable to delete the entity
		else{
 
			// set response code - 503 service unavailable
			http_response_code(503);
 
			// tell the user
			echo json_encode(array("message" => "Unable to delete from " . $name));
		}
	}
?>