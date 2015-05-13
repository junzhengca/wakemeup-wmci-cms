<?php
	//Session data
	$sessions = array(
		array("Water Quality Issues in Saskatchewan – Inequities on and off the Reserve and the Impact on Culture",
			  "Rebecca Zagozewski - Project manager School of Public Health, U of S Water Keeper<br> Jeff McLeod - Sturgeon Lake First Nation Member",
			  "Many First Nation communities are not able to have clean, safe drinking water. This presentation will outline some of the historical, financial, environmental, social/cultural, and political reasons as to why this occurs. Stories will also be told regarding the sacredness of water from a First Nations perspective. The information is based on research conducted with numerous Saskatchewan First Nations communities and the University of Saskatchewan."),
		array("Current Socio-Economic and Political Issues facing Aboriginal People",
			  "Dion Tootoosis - Cultural Mentor",
			  ""),
		array("Reclaiming Culture",
			  "Don Speidel - Saskatoon Public Schools Cultural Resource Liaison",
			  ""),
		array("Homelessness in Saskatoon",
			  "Deeann Mercier - Executive Director, Lighthouse<br> Roy McCallum - Mobile Outreach",
			"A 2012 count in Saskatoon found 372 people were homeless. Since that time the Lighthouse Supported Living has taken the lead in Saskatoon in providing innovated programs to provide emergency shelter, supported living and affordable housing for homeless individuals. <br> Roy works with the Lighthouse Mobile Outreach which goes into the community and transports homeless or at-risk individuals and provides street outreach. His broad work and life experience helps him connect to those in need of support and provides mentorship for kids in his community. DeeAnn heads the Lighthouse fundraising and media relations and helped plan the first YXE Connects, a free one-stop shop for the community to access free services and resources aimed at those in core neighbourhoods. This talk will focus on the work the Lighthouse does in Saskatoon and how youth can get involved to make a difference in their community with a Q and A to follow."),
		array("Urban Planning 101",
			  "Marian Loewen - City Counsellor",
			  "Saskatoon is growing quickly! So how do we make sure we grow into attractive, inclusive, and efficient place? This session will include a hands-on urban design challenge for participants and will also provide an opportunity for discussion about what City Hall does and how we can get better at it."),
		array("French Canadian and Métis Dance",
			  "Jeff Soucy - Teacher, WMCI",
			  "Students will learn some basic Métis and French Canadian gigue steps as well as a few round and square dances of Métis and French Canadian heritage. <br>Through active participation, students will learn how traditional dance played an important part in the communicative and socialization aspect of a community. <br>This will be a hands on active workshop.  You must be prepared to participate."),
		array("Women in Politics and Journalism",
			  "Bronwyn Eyre - Trustee",
			  "Bronwyn Eyre has been a writer/editor, newspaper columnist and radio broadcaster. She’s currently a School Board trustee and provincial political candidate. <br>She asks: Do women have more to prove than men in traditionally male fields? Do they have to work harder to succeed?"),
		array("The Story of My Escape from Afghanistan",
			  "Hossiendad Alizadeh - WMCI Staff Member",
			  ""),
		array("Sex. Computers. Bullying. ",
			  "Lana Morelli - Crown Prosecutor",
			  "In this session we will discuss consent, child pornography, luring, extortion, and bullying.  We will discuss what you should do if you are a victim or if you know someone who is victimizing someone else.   "),
		array("-",
			  "George Rathwell",
			  ""),
		array("Anxiety and Burnout in the Workforce: How to protect yourself",
			  "Coralee Pringle-Nelson - Registered Psychologist , Coordinator: Counselling Services / Saskatoon Public Schools",
			  ""),
		array("Whitecap Dakota First Nation’s History and role in the formation of Saskatoon & Celebration of Success",
			  "Chief Darcy Bear or Murray Long - Whitecap Dakota First Nation",
			  ""),
		array("-",
			  "Brenda Green - Superintendent of Education",
			  ""),
		array("Domestic Violence in Saskatoon",
			  "Vernon Linklater - Saskatoon Indian and Metis Friendship Centre School Board Trustee",
			  "The Teaching on domestic violence will be shared in a circle formation.  Vernon will share personal stories of violent acts he has seen and when he did his first violent act.  Humor will be used as a teaching tool.  There will be opportunity for sharing within the circle."),
		array("-",
			  "Kendal Netmaker - Neechie Gear",
			  "")
	);
?>
<h1>Sessions</h1>
<h3>CLICK ON TITLE TO VIEW MORE</h3>
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
    <h2 style="font-size:0.8em;">CLICK + IN DETAILS PANEL TO ADD A SESSION</h2>
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
    <h2>FINISHED?</h2>
    <h2 style="font-size:0.5em; opacity:0.7;">Remember, you can always modify your choices before xx/xx using profile code given after submit.</h2>
    <div class="red_button">SUBMIT YOUR CHOICES</div>
    <h2>HAVE A PROFILE CODE?</h2>
    <div class="red_button">RETRIVE YOUR CHOICES</div>
    <h2 style="font-size:0.5em; opacity:0.7;">Powered by Niyume Private API / Niyume Cloud Processing Stack © Jun Zheng All Rights Reserved</h2>
</div>
<script type="text/javascript">
$("#content_container").on('scroll',function(){
	if($("#content_container").scrollTop() > 230){
		$("#session_select_block").css({'position':'fixed','right':'70px','top':'25px'});
	} else {
		$("#session_select_block").css({'position':'absolute','right':'30px','top':'175px'});	
	}
});


var current_id = 0;
function open_detail_panel(title,speaker,info,id) {
	$("#details_panel").fadeIn();
	$("#details_panel_title").html(title);
	$("#details_panel_speaker").html(speaker);
	$("#details_panel_info").html(info);
	current_id = id;
}

function close_detail_panel(){
	$("#details_panel").fadeOut();
}

var session_arr = [];
var session_data = [];
<?php foreach($sessions as $key=>$data) { ?>
	session_data[<?php echo $key; ?>] = ["<?php echo $data[0]; ?>","<?php echo $data[1]; ?>","<?php echo $data[2]; ?>"];
<?php } ?>

function add_to_selection(){
	if($.inArray(current_id,session_arr) != 0){
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
</script>