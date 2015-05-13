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
	}
?>