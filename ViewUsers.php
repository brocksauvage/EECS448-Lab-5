<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "bsauvage", "Password456!", "bsauvage");

	/* check connection */
	if ($mysqli->connect_errno)
	{
 		printf("Connect failed: %s\n", $mysqli->connect_error);
  		exit();
	}	
	
	$query = "SELECT user_id FROM Users";
		
	if($result = $mysqli->query($query))
	{
		echo "<body><table border='1'><tr><td><b>Users<b></td></tr>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td>" . $row["user_id"] . "</td></tr>";		
		}
		echo "</table></body>";
		$result->free();
	}

	$mysqli->close();
?>
