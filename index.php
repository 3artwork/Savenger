<?php
	error_reporting(0);
	function start_connection($servername = 'localhost', $username = 'root', $password = '', $dbname = "scavenger")
	{
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		else 
		{
			return $conn;
		}
	}
	function replaceById(&$parent, $id, $code = '')
	{
		$child_html = new DOMDocument();
		$child_html->loadHTML($code);
		$node = $child_html->documentElement;
		$tag_html = $parent->getElementById($id);
		$node = $parent->importNode($node, true);
		$tag_html->parentNode->replaceChild($node, $tag_html);
	}
	libxml_use_internal_errors(true);
	$conn = start_connection();
	$query = "SELECT * From stats where UID = 3";
	$result = mysqli_fetch_array($query);
	$conn->close();
	$mainpage_html = new DOMDocument();
	$mainpage_html->formatOutput = false;
	$mainpage_html->loadHTMLFile('HTML/character.html');
	$updated_stats = "<ul id = \"stats\">
		<li><span>Health</span>		<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['health']."</span></li>
		<li><span>Stealth</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['stealth']."</span></li>
		<li><span>Strength</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['strength']."</span></li>
		<li><span>Keenness</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['keenness']."</span></li>
		<li><span>Endurance</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['endurance']."</span></li>
		<li><span>Swiftness</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['swiftness']."</span></li>
		<li><span>Diplomacy</span>	<div class=\"stats_container\"><div></div></div><span class=\"stat_num\">".$result['diplomacy']."</span></li>
	</ul>";
	replaceById($mainpage_html, 'stats', $updated_stats);
	echo $mainpage_html->saveHTML();
	libxml_use_internal_errors(false);
?>