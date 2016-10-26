<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$mysqli = new mysqli("mysql.eecs.ku.edu", "bsauvage", "Password456!", "bsauvage");
	$user = $_POST["user"];
	$post = $_POST["comment"];
	$flag = false;

	/* check connection */
	if ($mysqli->connect_errno)
	{
 		printf("Connect failed: %s\n", $mysqli->connect_error);
  		exit();
	}	
	
	$query = "SELECT user_id FROM Users";
	
	if($post != null)
	{	
		if($result = $mysqli->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				if($row["user_id"] == $user)
				{	
					$flag = true;
					break;
				}
			}
			
			$result->free();
		}

		if($flag == true)
		{
			$query = "INSERT INTO Posts(content, author_id)
						  VALUES('".$post."','".$user."')";
			$mysqli->query($query);
			echo "Post saved!";
		}
		else if($flag == false)
		{
			echo "Username entered not valid.";
		}
		$mysqli->close();
	}
	else
	{
		echo "Please enter a valid post.";
	}
?>
