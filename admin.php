<?php
	include "nus-php-sdk/include.php";
	$nus = new NusClient("http://nus.niyume.com/api");
	$loginStat = $nus->authorizeToken($_COOKIE["uname"],$_COOKIE["tk"]);
?>
<style>
#graph-container .bar {
	background-color:black;
	height:20px;
	color:blue;
}
</style>
<!doctype html>
<html>
	<head>
		<title>WMCI Wake Me Up Admin</title>
		<link href="https://ssl.jackzh.com/file/css/bootstrap/bootstrap-3-3-6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	</head>
	<body>
		<?php if ($loginStat["status"] == "failed" || $loginStat["data"]["group"] != "wakemeup-admin"){ ?>
			<div class="container">
				<h1>403 :( Forbidden</h1>
				<h2>You have to login before accessing this page</h2>
				<form id="login-form" action="login.php" method="post">
					<label>Username</label>
					<input class="form-control" name="username" type="text" /><br>
					<label>Password</label>
					<input class="form-control" name="password" type="password" /><br>
					<button class="btn btn-primary">Login</button>
				</form>
			</div>
		<?php } else { ?>
			<div class="container">
				<h2>Create a new session</h2>
				<form id="new-session-form" action="api/index.php" method="post">
					<input style="display:none;" name="action" type="text" value="CREATE_SESSION" />
					<label>Title</label>
					<input class="form-control" name="title" type="text" /><br>
					<label>Speaker</label>
					<input class="form-control" name="speaker" type="text" /><br>
					<label>Description</label>
					<textarea class="form-control" form="new-session-form" name="description"></textarea><br>
					<label>Availability</label>
					<input class="form-control" name="availability" type="text" /><br>
					<button class="btn btn-primary">Create</button>
				</form>
				<h2>Data Analyzation</h2>
				<h5>Powered by NDA Framework &copy; Jack Zheng</h5>
				<div id="graph-container"></div>
				<h2>Submissions</h2>
				<div id="submission-container"></div>
			</div>
		<?php } ?>
	</body>
</html>
<script type="text/javascript">
	var sessionSlot = {};
	var submissionCount = 0;
	$(function(){
		$.ajax({
			url:"api/index.php?action=GET_ALL_SUBMISSION",
			type:"GET",
			dataType:"json",
			success:function(data){
				console.log(data);
				table = "<table class='table table-bordered'>";
				for(i = 0; i < data.length; i++){
					sessionData = JSON.parse(data[i]["selection"]);
					selections = [];
					for(k = 0; k < sessionData.length; k++){
						if(sessionSlot[sessionData[k]["id"]] >= 0){
							sessionSlot[sessionData[k]["id"]] += 1;
						} else {
							sessionSlot[sessionData[k]["id"]] = 1;
						}
						availability = JSON.parse(sessionData[k]["availability"]);
						availability = availability[sessionData[k]["choosedSlot"]];
						for(m = 0; m < availability.length; m++){
							selections[availability[m]] = sessionData[k]["title"];
						}
					}
					table += "<tr>";
					table += "<td>" + i + "</td>";
					table += "<td>" + data[i]["student_number"] + "</td>";
					table += "<td>" + data[i]["name"] + "</td>";
					table += "<td>" + selections[1] + "</td>";
					table += "<td>" + selections[2] + "</td>";
					table += "<td>" + selections[3] + "</td>";
					table += "<td>" + selections[4] + "</td>";
					table += "<td>" + data[i]["english_teacher"] + "</td>";
					table += "</tr>";
				}
				table += "</table>";
				$("#submission-container").html(table);
				submissionCount = i;
				console.log(sessionSlot);
				analyzeData();
			}
		});
	});

	function analyzeData(){
		//First get all sessions
		console.log(submissionCount);
		$.ajax({
			url:"api/index.php",
			type:"POST",
			dataType:"json",
			data:{
				"action":"GET_ALL_SESSION"
			},
			success:function(data){
				console.log(data);
				graph = "";
				for(i = 0; i < data.length; i++){
					graph += "<h4>" + data[i]["title"] + "</h4>"
					graph += '<div class="progress">';
					graph += '<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: ' + sessionSlot[data[i]["id"]] / submissionCount * 100  + '%; text-align:left;">&nbsp;&nbsp;' + sessionSlot[data[i]["id"]] + '</div></div>';
				}
				$("#graph-container").html(graph);
			}
		});
	}
</script>