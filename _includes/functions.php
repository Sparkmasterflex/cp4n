<?php
  require("config.inc.php");
  require("Database.class.php");
	require("zipcode.php");
	
	
	function saveAddress($params) {
		$name 		= $params['name'];
		$address  = $params['address'] . ', ' . $params['city'] . ' NE ' . $params['zip'];
		$desc			= $params['comments'];
		
		$error = validateZipcode(intval($params['zip']));
		if($error) {
			return false;
		} else {
		  $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
			$db->connect();
			$q = "INSERT INTO addresses (name, address, description) VALUES ('$name', '$address', '$desc')";
			$success = $db->query($q);
			$db->close();
			
			return $success;
		}
	}
	
	function getAllMarkers() {
		$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		$addr = array();
		$names = array();
		$comments = array();
		$q = "SELECT name, address, description FROM addresses";
		$rows = $db->query($q);
		
		while ($record = $db->fetch_array($rows)) {
			array_push($names, $record['name']);
    	array_push($addr, $record['address']);
    	array_push($comments, $record['description']);
		}
		$db->close();
		
		return array($addr, $names, $comments);
	}
	
	function validateZipcode($zip) {
		$zipcodes = getZipCodes();
		
		if(!in_array($zip, $zipcodes)) {  return "The submitted zipcode is not a proper Nebraska zipcode"; }
	}


?>