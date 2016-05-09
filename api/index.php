<?php

	//This is not a RESTful API, just so you know = =. I'm too lazy to create a RESTful interface :)
	//This interface only accepts POST requests
	ini_set('display_errors', 1);
  	error_reporting(E_ALL ^ E_NOTICE);
	include "../nus-php-sdk/include.php";
	$nus = new NusClient("http://nus.niyume.com/api");
	$loginStat = $nus->authorizeToken($_COOKIE["uname"],$_COOKIE["tk"]);
	include_once "config.php";
	include_once "include/class_session.php";
	$mysqliObj = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
	$requestData = file_get_contents("php://input");
	parse_str($requestData,$requestData);
	if($requestData["action"] == "CREATE_SESSION"){
		if($loginStat["status"] == "failed" || $loginStat["data"]["group"] != "wakemeup-admin"){
			echo "failed";
		} else {
			$stmt = $mysqliObj->prepare("INSERT INTO wakemeup_sessions (title,speaker,description,availability) VALUES (?,?,?,?)");
			$stmt->bind_param("ssss",$requestData["title"],$requestData["speaker"],$requestData["description"],$requestData["availability"]);
			if($stmt->execute()){
				echo "success";
			} else {
				echo "failed";
			}
		}
	} else if($requestData["action"] == "GET_ALL_SESSION"){
		$stmt = $mysqliObj->prepare("SELECT * FROM wakemeup_sessions");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($resultId,$resultTitle,$resultSpeaker,$resultDescription,$resultAvilability);
		$sessions = array();
		while($stmt->fetch()){
			array_push($sessions,array(
				"id"=>utf8_encode($resultId),
				"title"=>utf8_encode($resultTitle),
				"speaker"=>utf8_encode($resultSpeaker),
				"description"=>utf8_encode($resultDescription),
				"availability"=>utf8_encode($resultAvilability)
			));
		}
		echo json_encode($sessions);
	} else if($requestData["action"] == "SUBMIT_SELECTION"){
		$stmt = $mysqliObj->prepare("INSERT INTO wakemeup_submissions (student_number,name,selection,english_teacher) VALUES (?,?,?,?)");
		$stmt->bind_param("ssss",$_POST["student_number"],$_POST["name"],$_POST["selection"],$_POST["english_teacher"]);
		if($stmt->execute()){
			echo "success";
		} else {
			echo "failed";
		}
	} else if($_GET["action"] == "GET_ALL_SUBMISSION"){
		if($loginStat["status"] == "failed" || $loginStat["data"]["group"] != "wakemeup-admin"){
			echo "failed";
		} else {
			$stmt = $mysqliObj->prepare("SELECT * FROM wakemeup_submissions");
			if($stmt->execute()){
				$stmt->store_result();
				$stmt->bind_result($resultStudentNumber,$resultName,$resultSelection,$resultEnglishTeacher);
				$result = array();
				while($stmt->fetch()){
					array_push($result,array(
						"student_number"=>$resultStudentNumber,
						"name"=>$resultName,
						"selection"=>$resultSelection,
						"english_teacher"=>$resultEnglishTeacher
					));
				}
				echo json_encode($result);
			} else {
				echo "failed";
			}
		}
	} else {
		echo "method not found";
	}

?>