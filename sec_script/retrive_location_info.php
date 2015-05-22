<?php
	require_once "../niyumedbapi_client/data.php";
	require_once "../niyumedbapi_client/databaseobj.php";
	$niyumeDb = new NiyumeDb(NIYUME_DBADDRESS,NIYUME_DBUSER,NIYUME_DBPASSWORD,"wmciwakemeup");
	$result = array();
	$name = explode(' ',$_POST['name']);
	if(max(array_keys($name)) != 1){
		$result['RESULT'] = "FAILED";
		$result['MESSAGE'] = "Name format incorrect, correct format is: Firstname[SPACE]Lastname";
	} else {
		
		$firstname = strtolower($name[0]);	
		$lastname = strtolower($name[1]);
		$res = $niyumeDb->selectstmt_all("SELECT * FROM sumbitinfo WHERE firstname='$firstname' AND lastname='$lastname'");
		if($res[0]){
			$result['RESULT'] = "SUCCESSFUL";
			$res[0]['choices'] = json_decode($res[0]['choices'],true);
			$result['DATA'] = $res[0];
		} else {
			$result['RESULT'] = "FAILED";
			$result['MESSAGE'] = "Name not found in database";
		}
	}
	echo json_encode($result);
?>