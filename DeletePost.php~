<?php
	
	function listing()
	{
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
	
		$query = "SELECT author_id, content, post_id FROM Posts";
	
		if($result = $mysqli->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>".$row["author_id"]."</td>";
				echo "<td>".$row["content"]."</td>";
				echo "<td><input name = 'posting[]' type='checkbox' value='".$row["post_id"]."'></td>";
				echo "</tr>";		
			}
			$result->free();
		}

		$mysqli->close();
	}

	$mysqli = new mysqli("mysql.eecs.ku.edu", "bsauvage", "Password456!", "bsauvage");
	$query = "SELECT author_id, content, post_id FROM Posts";

	if(isset($_POST['submit']))
	{
		$deleteArray = $_POST['posting'];
		if($result = $mysqli->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				for($i = 0; $i < count($deleteArray); $i=$i+1)
				{
					if($row["post_id"] == $deleteArray[$i])
					{
						$query = "DELETE FROM Posts WHERE post_id = '".$deleteArray[$i]."'";
						$result = $mysqli->query($query);
					}
				}
			}
		echo "Posts deleted: #";
		echo implode(',', $_POST['posting']);			
		$result->free();
		}
		
	}
	
	

	$mysqli->close();
?>
