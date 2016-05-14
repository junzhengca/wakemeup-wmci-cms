// Animation and other functions
function start_splash_timeline(){
	var splash_timeline = new TimelineMax({repeat:0});
	splash_timeline.add(TweenLite.to($("#school_img"),2,{'width':'110%','height':'110%','opacity':1,'top':'-5%','left':'-5%'}));
	splash_timeline.add(TweenLite.to($("#wakemeup_logo"),0.5,{'opacity':'1','bottom':'150px'}));
	splash_timeline.add(TweenLite.to($("#subtitle_img"),0.5,{'opacity':'1','right':'50px'}));
	splash_timeline.add(TweenLite.to($("#location_img"),0.5,{'opacity':'0.8'}));
	splash_timeline.add(TweenLite.to($("#enter_button"),0.5,{'opacity':'0.3'}));
}
function close_splash_screen(){
	TweenLite.to($("#splash_container"),1,{'left':'-100%','opacity':'0'});	
}


function hash_changed(){
	if(window.location.hash != "#splash"){
		close_splash_screen();
		hash_change_page();
	}
}

function hash_change_page(){
	$("#loading_icon").show();
	if(window.location.hash == "#overview"){
		$.ajax({url:"pages/overview.html?v=1",success: function(data){
			$("#content_text_container").html(data);
			$("#loading_icon").hide();
		}});
	} else if (window.location.hash == "#timetable") {
		$.ajax({url:"pages/timetable.html?v=1",success: function(data){
			$("#content_text_container").html(data);
			$("#loading_icon").hide();
		}});
	} else if (window.location.hash == "#sessions") {
		$.ajax({url:"pages/sessions.php?v=1",success: function(data){
			$("#content_text_container").html(data);
			$("#loading_icon").hide();
		}});
	} else if (window.location.hash == "#myschedule") {
		$.ajax({url:"pages/myschedule.php?v=1",success: function(data){
			$("#content_text_container").html(data);
			$("#loading_icon").hide();
		}});
	}
}

function change_hash(newHash){
	window.location.hash = newHash;
}


//Make sure we have a hash value
function startup_hash_check(){
	if(window.location.hash == "" || window.location.hash == "#splash"){
		window.location.hash = "splash";
		start_splash_timeline();
	} else {
		$("#splash_container").hide();
		hash_changed();
	}
}

function close_reminder(){
	$("#reminder_container").fadeOut();	
}

startup_hash_check();