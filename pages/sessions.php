<?php
	//Session data
	$sessions = array(
		array("Blanket Simulation (Workshop)","TBA","TBA"),
		array("Slam Poetry (Workshop)","TBA","TBA"),
		array("Art, Jewelry and Creations with our Community (Workshop)","TBA","TBA"),
		array("Water Quality Issues in Saskatchewan – Inequities on and off the Reserve and the Impact on Culture",
			  "Rebecca Zagozewski - Project manager School of Public Health, U of S Water Keeper<br> Jeff McLeod - Sturgeon Lake First Nation Member",
			  "Many First Nation communities are not able to have clean, safe drinking water. This presentation will outline some of the historical, financial, environmental, social/cultural, and political reasons as to why this occurs. Stories will also be told regarding the sacredness of water from a First Nations perspective. The information is based on research conducted with numerous Saskatchewan First Nations communities and the University of Saskatchewan."),
		array("Urban Planning 101",
			  "Mairin Loewen - City Counsellor",
			  "Saskatoon is growing quickly! So how do we make sure we grow into attractive, inclusive, and efficient place? This session will include a hands-on urban design challenge for participants and will also provide an opportunity for discussion about what City Hall does and how we can get better at it."),
		array("French Canadian and Métis Dance",
			  "Jeff Soucy - Teacher, WMCI",
			  "Students will learn some basic Métis and French Canadian gigue steps as well as a few round and square dances of Métis and French Canadian heritage. <br>Through active participation, students will learn how traditional dance played an important part in the communicative and socialization aspect of a community. <br>This will be a hands on active workshop.  You must be prepared to participate."),
		array("The Story of My Escape from Afghanistan",
			  "Hossiendad Alizadeh - WMCI Staff Member",
			  ""),
		array("Sex. Computers. Bullying. ",
			  "Lana Morelli - Crown Prosecutor",
			  "In this session we will discuss consent, child pornography, luring, extortion, and bullying.  We will discuss what you should do if you are a victim or if you know someone who is victimizing someone else.   "),
		array("Anxiety and Burnout in the Workforce: How to protect yourself",
			  "Coralee Pringle-Nelson - Registered Psychologist , Coordinator: Counselling Services / Saskatoon Public Schools",
			  "The world of work and career is an exciting place to be.  New adventures with the potential for great life outcomes—financial, relational and professional—are out there.  Despite all the great things associated with starting a job or entering a career, there are some ways of thinking and relating that are helpful for ensuring that work experiences remain positive. This session will talk about how to keep yourself in a mentally and emotionally healthy state so you can thrive in the world of work despite expected challenges that come your way over the course of your career."),
		array("Domestic Violence in Saskatoon",
			  "Vernon Linklater - Saskatoon Indian and Metis Friendship Centre School Board Trustee",
			  "The Teaching on domestic violence will be shared in a circle formation. Vernon will share personal stories of violent acts he has seen and when he did his first violent act. Humor will be used as a teaching tool. There will be opportunity for sharing within the circle."),
		array("Perspectives on Policing and Leadership",
			  "Ernie Louttit - Retired Saskatoon police officer and author of  Indian Ernie",
			  "Drawing on his personal experiences presents on the theme - Everything you do matters and everyone is a leader at some time. Disarming racism and avoiding crime are important personal choices young adults have the ability to make. Sounds dull but hang on……."),
		array("Legalization of Marijuana? Good or Bad Idea",
			  "Kevin Schwartz - Saskatoon Police Officer",
			  "Do you know what gang colors are?  Do you know the drugs on the street?")
	);
?>
<h1>Sessions</h1>
<h3>CLICK ON TITLE TO VIEW MORE</h3>
<div id="sessionfix"></div>
<?php foreach($sessions as $key=>$data) { ?>
<div class="sessions_block" onClick='open_detail_panel("<?php echo $data[0]; ?>","<?php echo $data[1]; ?>","<?php echo $data[2]; ?>",<?php echo $key; ?>)'>
	<h4><?php echo $data[0]; ?></h4>
    <h5><?php echo $data[1]; ?></h5>
</div>
<?php } ?>
<div id="details_panel">
    <div id="details_panel_text">
        <h1 id="details_panel_title"></h1>
        <h2 id="details_panel_speaker"></h2>
        <p id="details_panel_info">
        </p>
    </div>
    <div id="details_panel_close" onClick="close_detail_panel();">
    	<i class="fa fa-times"></i>
    </div>
    <div id="details_panel_add" onClick="add_to_selection();"><i class="fa fa-plus"></i> ADD TO SELECTION</div>
</div>
<div id="session_select_block">
	<h1>Selections</h1>
    <h2 id="selections_sub" style="font-size:0.8em;">CLICK + IN DETAILS PANEL TO ADD A SESSION</h2>
    <div class="session_select_card">
    	<div class="session_select_card_num">1</div>
        <h1 id="session_select_1" style="padding-left:30px; font-size:1em;"></h1>
    </div>
    <div class="session_select_card">
    	<div class="session_select_card_num">2</div>
        <h1 id="session_select_2" style="padding-left:30px; font-size:1em;"></h1>
    </div>
    <div class="session_select_card">
    	<div class="session_select_card_num">3</div>
        <h1 id="session_select_3" style="padding-left:30px; font-size:1em;"></h1>
    </div>
    <input type="hidden" id="profile_code_txt" value="" />
    <h2>DISABLED</h2>
    <h2 style="font-size:0.5em; opacity:0.7;">Remember, you can always modify your choices before May 20th using profile code given after initial submit.</h2>
    <div class="red_button">DISABLED</div>
</div>

<div id="window_mask" onClick="close_retrive_window(); close_submit_window(); close_detail_panel();"></div>
<div id="submit_window">
	<h1>SUBMIT YOUR CHOICES</h1>
    <h2 style="padding-left:20px; padding-right:20px;">REMEMBER: YOU CAN ALWAYS CHANGE YOUR MIND BEFORE MAY 20th<br><b>IF YOU ALREADY SUBMITTED YOUR SELECTIONS, PLEASE DO NOT SUBMIT AGAIN! USE [RETRIEVE YOUR CHOICES] BUTTON TO MODIFY YOUR SELECTIONS. (UNLESS YOU FORGOT YOUR CODE)</b></h2>
    <form>
    	<input type="text" id="firstname_txt" placeholder="First Name" class="std_text" value="First Name"/>
        <input type="text" id="lastname_txt" placeholder="Last Name" class="std_text" value="Last Name" />
        <input type="text" id="engteacher_txt" placeholder="Your English Teacher" class="std_text" value="" />
    </form>
    <button class="red_button" style="width:502px; text-align:center;" onClick="submit_selection();">SUBMIT AND GET A PROFILE CODE</button>
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
$("#content_container").on('scroll',function(){
	if($(document).width() > 1000){
		if($("#content_container").scrollTop() > 230){
			$("#session_select_block").css({'position':'fixed','right':'70px','top':'25px'});
		} else {
			$("#session_select_block").css({'position':'absolute','right':'30px','top':'175px'});
		}
	}
});


var current_id = 0;
function open_detail_panel(title,speaker,info,id) {
	$("#details_panel").fadeIn();
	$("#details_panel_title").html(title);
	$("#details_panel_speaker").html(speaker);
	$("#details_panel_info").html(info);
	current_id = id;
	$("#window_mask").fadeIn();
}

function close_detail_panel(){
	$("#details_panel").fadeOut();
	$("#window_mask").fadeOut();
}

var session_arr = [];
var session_data = [];
<?php foreach($sessions as $key=>$data) { ?>
	session_data[<?php echo $key; ?>] = ["<?php echo $data[0]; ?>","<?php echo $data[1]; ?>","<?php echo $data[2]; ?>"];
<?php } ?>

function add_to_selection(){
	if(!inArray(current_id,session_arr)){
		if(session_arr.length == 3){
			session_arr[0] = session_arr[1];
			session_arr[1] = session_arr[2];
			session_arr[2] = current_id;
		} else {
			session_arr[session_arr.length] = current_id;
		}
		$("#session_select_1").html(session_data[session_arr[0]][0]);
		$("#session_select_2").html(session_data[session_arr[1]][0]);
		$("#session_select_3").html(session_data[session_arr[2]][0]);
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

function open_submit_window(){
	if(session_arr.length != 3){
		alert("Please choose 3 sessions");
		return false;
	}
	TweenLite.to($("#submit_window"),1,{'top':'0px'});
	$("#window_mask").fadeIn();
}

function close_submit_window(){
	TweenLite.to($("#submit_window"),1,{'top':'-800px'});
	$("#window_mask").fadeOut();
}

function submit_selection(){
	if($("#firstname_txt").val() == "" || $("#lastname_txt").val() == "" || $("#engteacher_txt").val() == ""){
		alert("Please fill out the form completely");
		return false;
	}
	close_submit_window();
	var choices = "";
	for(i=0;i<session_arr.length;i++){
		if(i == 2){
			choices = choices + session_arr[i].toString();
		} else {
			choices = choices + session_arr[i].toString() + ",";
		}
	}
	$.ajax({url:"sec_script/wmciwakemeup_portal.php",type:"GET",data:{
		"firstname":$("#firstname_txt").val(),
		"lastname":$("#lastname_txt").val(),
		"englishteacher":$("#engteacher_txt").val(),
		"choices":choices,
		"mode":"submit"
	},success: function(data){
		alert("Thank you for submitting your choices, please remember the following code:\n==========\n" + data + "\n==========\nYou can use this code to modify your choices before xx/xx");
		window.location.reload();
	}});
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
