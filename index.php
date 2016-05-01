<?php
	include 'engine.php';
	error_reporting(E_ALL);
	libxml_use_internal_errors(true);
	$mainpage_html = new DOMDocument();
	$mainpage_html->formatOutput = false;
	$mainpage_html->loadHTMLFile('HTML/character.html');
	$row = query_database("SELECT * From stats where UID = 3");
	$updated_stats = "<ul id = \"stats\">
		<li><span>Health</span>		<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['health']."</span></li>
		<li><span>Stealth</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['stealth']."</span></li>
		<li><span>Strength</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['strength']."</span></li>
		<li><span>Keenness</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['keenness']."</span></li>
		<li><span>Endurance</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['endurance']."</span></li>
		<li><span>Swiftness</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['swiftness']."</span></li>
		<li><span>Diplomacy</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$row[0]['diplomacy']."</span></li>
	</ul>";
	replaceById($mainpage_html, 'stats', $updated_stats);
	echo $mainpage_html->saveHTML();
	libxml_use_internal_errors(false);
	
?>