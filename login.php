<?php
	include "nus-php-sdk/include.php";
	$nus = new NusClient("http://nus.niyume.com/api");
	$loginStat = $nus->authorizeUser($_POST["username"],$_POST["password"]);
	if($loginStat["status"] != "failed"){
		setcookie("uname",$_POST["username"],time() + 60*60*24*5,"/");
		setcookie("tk",$loginStat["data"]["token_body"],time() + 60*60*24*5,"/");
	}
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
		<link href="https://ssl.jackzh.com/file/css/bootstrap/bootstrap-3-3-6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php if ($loginStat["status"] == "failed"){ ?>
			<div class="container">
				<h1>Login failed <a href="admin.php">[Back]</a></h1>
			</div>
		<?php } else { ?>
			<div class="container">
				<h1>Login successful <a href="admin.php">[Proceed]</a></h1>
			</div>
		<?php } ?>
	</body>
</html>