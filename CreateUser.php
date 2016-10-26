<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "bsauvage", "Password456!", "bsauvage");
	$user = $_POST["user"];

	/* check connection */
	if ($mysqli->connect_errno)
	{
 		printf("Connect failed: %s\n", $mysqli->connect_error);
  		exit();
	}	
	
	$query = "SELECT user_id FROM Users";
	
	if($user != null)
	{	
		if($result = $mysqli->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				if($row["user_id"] == $user)
				{
					echo "A user with this name already exists!";
					return false;
				}
			}
			$query = "INSERT INTO Users(user_id) 
				  VALUES('".$user."')";
			$mysqli->query($query);
			$result->free();
			echo "User " .$user. " created and stored!";
		}

		$mysqli->close();
	}
	else
	{
		echo "Please enter a valid username.";
	}
?>
