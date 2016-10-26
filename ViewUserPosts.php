<?php
	/*error_reporting(E_ALL);
	ini_set("display_errors", 1);*/
	
	
	function menu()
	{
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
			while($row = $result->fetch_assoc())
			{
				echo "<option value = '".$row["user_id"]."'>" . $row["user_id"] . "</option>";
			}
			$result->free();
		}
		$mysqli->close();
	}
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "bsauvage", "Password456!", "bsauvage");

	if(isset($_POST['users']))
	{
		$user = $_POST['users'];
	}
	/* check connection */
	if ($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
  		exit();
	}
	
	$query = "SELECT author_id, content FROM Posts";
	
	if($result = $mysqli->query($query))
	{
		echo "<table border='1'><tr><td><b>Author: ".$user."<b></td></tr>";
		while($row = $result->fetch_assoc())
		{
			if($row["author_id"] == $user)
			{
				echo "<tr><td>" . $row["content"] . "</td></tr>";		
			}
		}
		echo "</table>";
		$result->free();
	}

	$mysqli->close();
	
?>
