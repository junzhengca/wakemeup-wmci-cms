<?php
	
?>
<h1>Locations</h1>
<h3>CLICK ON TITLE TO VIEW MORE</h3>
<div id="sessionfix"></div>
<div id="sessions_container"></div>
<div id="details_panel">
    <div id="details_panel_text">
        <h1 id="details_panel_title"></h1>
        <h2 id="details_panel_speaker"></h2>
        <p id="details_panel_info">
        <p id="details_panel_offer">
        </p>
    </div>
    <div id="details_panel_close" onClick="closeDetailPanel();">
    	<i class="fa fa-times"></i>
    </div>
    <div id="details_panel_add" onClick="Student.addSession(sessionData[currentIndex]);"><i class="fa fa-plus"></i> ADD TO SELECTION</div>
</div>
<div id="session_select_block" style="display:none;">
	<h1>Your Schedule</h1>
    <h2 id="selections_sub" style="font-size:0.8em;">CLICK + IN DETAILS PANEL TO ADD A SESSION<br>CLICK ON A SESSION BELOW TO DELETE</h2>
    <div class="session_select_card">
    	<div class="session_select_card_num">1</div>
        <h1 id="session_select_1" style="padding-left:30px; font-size:1em;"></h1>
        <div class="session_select_delete" onclick="Student.removeSessionBySlot(1);">DELETE</div>
    </div>
    <div class="session_select_card">
    	<div class="session_select_card_num">2</div>
        <h1 id="session_select_2" style="padding-left:30px; font-size:1em;"></h1>
        <div class="session_select_delete" onclick="Student.removeSessionBySlot(2);">DELETE</div>
    </div>
    <div class="session_select_card">
    	<div class="session_select_card_num">3</div>
        <h1 id="session_select_3" style="padding-left:30px; font-size:1em;"></h1>
        <div class="session_select_delete" onclick="Student.removeSessionBySlot(3);">DELETE</div>
    </div>
    <div class="session_select_card">
    	<div class="session_select_card_num">4</div>
        <h1 id="session_select_4" style="padding-left:30px; font-size:1em;"></h1>
        <div class="session_select_delete" onclick="Student.removeSessionBySlot(4);">DELETE</div>
    </div>
    <input type="hidden" id="profile_code_txt" value="" />
    <div class="red_button" onclick="openSubmitWindow();">SUBMIT</div>
</div>

<div id="window_mask" onClick="close_retrive_window(); closeSubmitWindow(); closeDetailPanel();"></div>
<div id="submit_window">
	<h1>SUBMIT YOUR CHOICES</h1>
    <h2 style="padding-left:20px; padding-right:20px;">You can always change your selection before May 13th. We will use your latest submission. Just make sure you are using the same name and student number<br>Type NONE if you do not have English this semester<br>Type NONE if you do not have a student number</h2>
    <form>
    	<label>First and last name</label><br>
    	<input type="text" id="name_txt" placeholder="First and Last Name" class="std_text"/><br>
    	<label>Student number</label><br>
        <input type="text" id="studentnumber_txt" placeholder="Student Number" class="std_text" /><br>
        <label>English teacher</label><br>
        <input type="text" id="engteacher_txt" placeholder="Your English Teacher" class="std_text" value="" />
    </form>
    <button class="red_button" style="width:502px; text-align:center;" onClick="submitSelection();">SUBMIT</button>
</div>
<div id="retrive_window" style="text-align:center;">
	<h1 style="text-align:center;">RETRIEVE YOUR CHOICES</h1>
    <h2 style="font-size:1em; font-weight:100; text-align:center;">PLEASE USE THE 5-DIGIT CODE GIVEN</h2>
    <form>
    	<input type="text" id="retrive_code_txt" placeholder="Code" class="std_text" >
    </form>
    <button class="red_button" style="width:502px; text-align:center;" onClick="retrive_selection();">RETRIVE MY INFO</button>
</div>
<script type="text/javascript">
var Student = {
	sessionChoosed:[],
	addSession:function(session){
		console.log(session);
		if(this.containsSession(session)){
			alert("You have already chosen this session");
			return false;
		} else {
			selected = $("input[type='radio'][name='timeslot-radio']:checked");
			if(selected.length > 0){
				timeSelection = JSON.parse(session["availability"])[selected.val()];
				console.log(timeSelection);
				if(this.timeSlotAvaliable(timeSelection)){
					this.sessionChoosed[this.sessionChoosed.length] = session;
					this.sessionChoosed[this.sessionChoosed.length - 1]["choosedSlot"] = selected.val();
					alert("Added to your schedule");
					closeDetailPanel();
					reloadSchedulePanel();
				} else {
					alert("Time slot not available");
				}
			} else {
				alert("You must select a time");
			}
		}
	},
	containsSession:function(session){
		for(i = 0; i < this.sessionChoosed.length; i++){
			if(this.sessionChoosed[i]["id"] == session["id"]){
				return true;
			} else {
				return false;
			}
		}
	},
	timeSlotAvaliable:function(slot){
		for(i = 0; i < slot.length; i++){
			for(j = 0; j < this.sessionChoosed.length; j++){
				for (k = 0; k < JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]].length; k++){
					//console.log(this.sessionChoosed[j]["availability"][this.sessionChoosed[j]["choosedSlot"]][k]);
					if(JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]][k] == slot[i]){
						return false;
					}
				}
			}
		}
		return true;
	},
	getSessionAtTimeSlot:function(slot){
		for(j = 0; j < this.sessionChoosed.length; j++){
			for (k = 0; k < JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]].length; k++){
				if(JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]][k] == slot){
					return this.sessionChoosed[j];
				}
			}
		}
		return false;
	},
	removeSessionBySlot:function(slot){
		for(j = 0; j < this.sessionChoosed.length; j++){
			for (k = 0; k < JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]].length; k++){
				if(JSON.parse(this.sessionChoosed[j]["availability"])[this.sessionChoosed[j]["choosedSlot"]][k] == slot){
					this.sessionChoosed.splice(j,1);
					reloadSchedulePanel();
					return true;
				}
			}
		}
	},
	isSlotFull:function(){
		for(m = 1; m < 5; m++){
			if(this.timeSlotAvaliable([m])){
				return false;
			}
		}
		return true;
	}
}

var sessionData;
var currentIndex;
$("#content_container").on('scroll',function(){
	if($(document).width() > 1000){
		if($("#content_container").scrollTop() > 230){
			$("#session_select_block").css({'position':'fixed','right':'70px','top':'25px'});
		} else {
			$("#session_select_block").css({'position':'absolute','right':'30px','top':'175px'});
		}
	}
});

function reloadSessionList(){
	finalStr = "";
	for(i = 0; i < sessionData.length; i++){
		console.log(i);
		finalStr += "<div class='sessions_block' onclick='openDetailPanel(" + i + ")'><h4>" + sessionData[i]["title"] + "</h4></h5>" + sessionData[i]["speaker"] + "</h5>";
		finalStr += "</div>";
	}
	$("#sessions_container").html(finalStr);
}

$(function(){
	$.ajax({
		url:"api/index.php",
		type:"POST",
		data:{
			action:"GET_ALL_SESSION"
		},
		dataType:"json",
		success:function(data){
			sessionData = data;
			reloadSessionList();
		}
	})
});


function openDetailPanel(index){
	$("#details_panel").fadeIn();
	$("#details_panel_title").html(sessionData[index]["title"]);
	$("#details_panel_speaker").html(sessionData[index]["speaker"] );
	$("#details_panel_info").html(sessionData[index]["description"]);
	offerStr = "";
	for(i = 0; i < JSON.parse(sessionData[index]["availability"]).length; i++){
		offerStr += "<input type='radio' name='timeslot-radio' value='" + i + "' /> Time slot " + JSON.parse(sessionData[index]["availability"])[i].toString() + " ";
	}
	$("#details_panel_offer").html("This session is offered in: " + offerStr);
	$("#window_mask").fadeIn();
	currentIndex = index;
}

function closeDetailPanel(){
	$("#details_panel").fadeOut();
	$("#window_mask").fadeOut();
}

function reloadSchedulePanel(){
	for(i = 1; i < 5; i++){
		currentSession = Student.getSessionAtTimeSlot(i);
		if(currentSession){
			$("#session_select_" + i.toString()).html(currentSession["title"]);
		} else {
			$("#session_select_" + i.toString()).html("");
		}
	}
	
}


function retrive_selection(){
	$.ajax({url:"sec_script/wmciwakemeup_portal.php",dataType:"json",type:"GET",data:{
		"code":$("#retrive_code_txt").val(),
		"mode":"retrive"
	},success: function(data){
		if(data['RESULT']){
			$("#selections_sub").html("YOU ARE UPDATING " + data['NAME'] + "'S SELECTIONS");
			session_arr[0] = parseInt(data['SELECTIONS'][0]);
			session_arr[1] = parseInt(data['SELECTIONS'][1]);
			session_arr[2] = parseInt(data['SELECTIONS'][2]);
			$("#session_select_1").html(session_data[session_arr[0]][0]);
			$("#session_select_2").html(session_data[session_arr[1]][0]);
			$("#session_select_3").html(session_data[session_arr[2]][0]);
			$("#profile_code_txt").val($("#retrive_code_txt").val());
			close_retrive_window();
			alert("Selection retrived");
		} else {
			alert("Code entered is not valid");
		}
	}});
}

function open_retrive_window(){
	$("#retrive_window").fadeIn();
	$("#window_mask").fadeIn();
}

function close_retrive_window(){
	$("#retrive_window").fadeOut();
	$("#window_mask").fadeOut();
}

function openSubmitWindow(){
	if(Student.isSlotFull()){
		TweenLite.to($("#submit_window"),1,{'top':'0px'});
		$("#window_mask").fadeIn();
	} else {
		alert("Please fill your time slot");
		return false;
	}
}

function closeSubmitWindow(){
	TweenLite.to($("#submit_window"),1,{'top':'-800px'});
	$("#window_mask").fadeOut();
}

function submitSelection(){
	if($("#name_txt").val() == "" || $("#studentnumber_txt").val() == "" || $("#engteacher_txt").val() == ""){
		alert("Please fill out the form completely");
	} else {
		closeSubmitWindow();
		$.ajax({
			url:"api/index.php",
			type:"POST",
			data:{
				action:"SUBMIT_SELECTION",
				student_number:$("#studentnumber_txt").val(),
				name:$("#name_txt").val(),
				selection:JSON.stringify(Student.sessionChoosed),
				english_teacher:$("#engteacher_txt").val()
			},
			success:function(data){
				if(data == "success"){
					alert("Submission successful! Thank you! You can safely leave this page now.");
					closeSubmitWindow();
					location.reload();
				} else {
					alert("Oops, unknown error occured, please try again. " + data);
				}
			}
		})
	}
}

function submit_selection_click(){
	var choices = "";
	for(i=0;i<session_arr.length;i++){
		if(i == 2){
			choices = choices + session_arr[i].toString();
		} else {
			choices = choices + session_arr[i].toString() + ",";
		}
	}
	if($("#profile_code_txt").val() == ""){
		open_submit_window();
	} else {
		$.ajax({url:"sec_script/wmciwakemeup_portal.php",type:"GET",data:{
			"code":$("#profile_code_txt").val(),
			"choices":choices,
			"mode":"modify"
		},success: function(data){
			if(data == "SUCCESS"){
				alert("Choices modified");
				window.location.reload();
			} else {
				alert("Unknown error, please try again");
			}
		}});
	}
}

function inArray(value,array){
	isin = false;
	for(i=0;i<array.length;i++){
		if(value == array[i]){
			isin = true;
			break;
		}
	}
	return isin;
}
</script>
