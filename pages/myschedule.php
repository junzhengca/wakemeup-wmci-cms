<div id="overview_background"></div>
<div class="container">
<input id="student-number-textbox" type="text" placeholder="Your Student Number" />
<button class="red_button" style="font-size:1.2em; height:auto; text-align:center; padding-left:40px; padding-right:40px; opacity:0.7; box-shadow:#FFE5E5 0px 0px 20px; border-radius:5px; margin:0; margin-top:20px;" onClick="getSchedule();">Check</button>
<div id="schedule-container"></div>
</div>
<script type="text/javascript">
	function getSchedule(){
		$.ajax({
			url:"api/index.php?action=GET_SUBMISSION_BY_STUDENTNUMBER&student_number=" + $("#student-number-textbox").val(),
			dataType:"json",
			success:function(data){
				if(data.length > 0){
					displayStr = "<p>";
					displayStr += "<h4>English Teacher</h4>" + data[data.length - 1]["english_teacher"];
					displayStr += "<h4>Name</h4>" + data[data.length - 1]["name"];
					//console.log(sessions);

					sessionData = JSON.parse(data[data.length - 1]["selection"]);
					selections = [];
					for(k = 0; k < sessionData.length; k++){
						availability = JSON.parse(sessionData[k]["availability"]);
						availability = availability[sessionData[k]["choosedSlot"]];
						for(m = 0; m < availability.length; m++){
							selections[availability[m]] = sessionData[k]["title"];
						}
					}
					console.log(selections);
					for(i = 1; i < 5; i++){
						displayStr += "<h4>Time Slot " + i + "</h4>" + selections[i];
					}

					$("#schedule-container").html(displayStr + "</p>");
				} else {
					alert("Student number not found");
				}
			}
		})
	}
</script>