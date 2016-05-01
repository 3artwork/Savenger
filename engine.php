<?php
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
	function fetch_arrays($result) {
	    $rows = array();
	    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
	        $rows[] = $row;
	    }
	    return $rows;
	}
	function query_database($query = '') {
		$conn = start_connection();
		$result = mysqli_query($conn, $query);
		$array = fetch_arrays($result);
		mysqli_free_result($result);
		$conn->close();
		return $array;
	}
?>