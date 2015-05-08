<?php
	//Session data
	$sessions = array(
		array("Water Quality Issues in Saskatchewan – Inequities on and off the Reserve and the Impact on Culture",
			  "Rebecca Zagozewski - Project manager School of Public Health, U of S Water Keeper<br> Jeff McLeod - Sturgeon Lake First Nation Member"),
		array("Current Socio-Economic and Political Issues facing Aboriginal People",
			  "Dion Tootoosis - Cultural Mentor"),
		array("Reclaiming Culture",
			  "Don Speidel - Saskatoon Public Schools Cultural Resource Liaison"),
		array("Homelessness in Saskatoon",
			  "Deeann Mercier - Executive Director, Lighthouse<br> Roy McCallum - Mobile Outreach"),
		array("Urban Planning 101",
			  "Marian Loewen - City Counsellor"),
		array("French Canadian and Métis Dance",
			  "Jeff Soucy - Teacher, WMCI"),
		array("Women in Politics and Journalism",
			  "Bronwyn Eyre - Trustee"),
		array("The Story of My Escape from Afghanistan",
			  "Hossiendad Alizadeh - WMCI Staff Member"),
		array("Sex. Computers. Bullying. ",
			  "Lana Morelli - Crown Prosecutor"),
		array("-",
			  "George Rathwell"),
		array("Anxiety and Burnout in the Workforce: How to protect yourself",
			  "Coralee Pringle-Nelson - Registered Psychologist , Coordinator: Counselling Services / Saskatoon Public Schools"),
		array("Whitecap Dakota First Nation’s History and role in the formation of Saskatoon & Celebration of Success",
			  "Chief Darcy Bear or Murray Long - Whitecap Dakota First Nation"),
		array("-",
			  "Brenda Green - Superintendent of Education"),
		array("Domestic Violence in Saskatoon",
			  "Vernon Linklater - Saskatoon Indian and Metis Friendship Centre School Board Trustee"),
		array("-",
			  "Kendal Netmaker - Neechie Gear")
	);
?>
<h1>Sessions</h1>
<h3>CLICK ON TITLE TO VIEW MORE</h3>
<?php foreach($sessions as $data) { ?>
<div class="sessions_block">
	<h4><?php echo $data[0]; ?></h4>
    <h5><?php echo $data[1]; ?></h5>
</div>
<div id="session_select_block">
	<h1>Selections</h1>
    <h2>CLICK + IN DETAILS PANEL TO ADD A SESSION</h2>
</div>
<div id="details_panel">
    <div id="details_panel_text">
        <h1>Water Quality Issues in Saskatchewan – Inequities on and off the Reserve and the Impact on Culture </h1>
        <h2>Rebecca Zagozewski - Project manager School of Public Health, U of S Water Keeper<br> Jeff McLeod - Sturgeon Lake First Nation Member</h2>
        <p>
        A 2012 count in Saskatoon found 372 people were homeless. Since that time the Lighthouse Supported Living has taken the lead in Saskatoon in providing innovated programs to provide emergency shelter, supported living and affordable housing for homeless individuals. 
    
    Roy works with the Lighthouse Mobile Outreach which goes into the community and transports homeless or at-risk individuals and provides street outreach. His broad work and life experience helps him connect to those in need of support and provides mentorship for kids in his community. DeeAnn heads the Lighthouse fundraising and media relations and helped plan the first YXE Connects, a free one-stop shop for the community to access free services and resources aimed at those in core neighbourhoods. This talk will focus on the work the Lighthouse does in Saskatoon and how youth can get involved to make a difference in their community with a Q & A to follow.
    
        </p>
    </div>
    <div id="details_panel_close">
    	<i class="fa fa-times"></i>
    </div>
    <div id="details_panel_add"><i class="fa fa-plus"></i> ADD TO SELECTION</div>
</div>
<?php } ?>