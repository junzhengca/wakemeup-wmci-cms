<?php
	require_once "../niyumedbapi_client/data.php";
	require_once "../niyumedbapi_client/databaseobj.php";
	$niyumeDb = new NiyumeDb(NIYUME_DBADDRESS,NIYUME_DBUSER,NIYUME_DBPASSWORD,"wmciwakemeup");
	if($_GET['mode'] == 'submit'){
		$id = substr(hash("sha512",time()),-3);
		$id = strtoupper($id . substr($_GET['firstname'],0,1) . substr($_GET['lastname'],0,1));
		$stmt = $niyumeDb->prepstmt("INSERT INTO sumbitinfo (firstname,lastname,englishteacher,profilecode,choices) VALUES (?,?,?,?,?)");
		$choices = json_encode(explode(",",$_GET['choices']));
		$stmt->bind_param("sssss",$_GET['firstname'],$_GET['lastname'],$_GET['englishteacher'],$id,$choices);
		if($stmt->execute()){
			echo $id;
		}
	} elseif ($_GET['mode'] == 'retrive') {
		//Using prepared stmt for select is a pain. so.....
		//It's impossible to do any damange with a string less than 5....
		if(strlen($_GET['code']) == 5){
			$res = $niyumeDb->selectstmt_all("SELECT * FROM sumbitinfo WHERE profilecode='$_GET[code]'");
			$echores = array();
			if($res == false){
				$echores["RESULT"] = false;
			} else {
				$echores["RESULT"] = true;
				$echores["NAME"] = $res[0]['firstname'] . " " . $res[0]['lastname'];
				$echores["CODE"] = $_GET['code'];
				$echores["SELECTIONS"] = json_decode($res[0]["choices"],true);
			}
		} else {
			$echores["RESULT"] = false;
		}
		echo json_encode($echores);
	}
?>