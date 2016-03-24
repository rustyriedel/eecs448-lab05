<?php

	$selection = $_POST['options'];
	
 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}
	echo "<h1>" . $selection . "('s) Posts</h1>";
	
 	//build command to get users from database
	$query = "SELECT * FROM Posts WHERE author_id = '" . $selection . "'";
	
	//query the database
	if ($result = $conn->query($query)){
		//start table tag and formatting
		echo "<table>";
		echo "<tr><td>post_id</td><td>content</td></tr>";

		//fill table with post_ids and content 
		while ($row = $result->fetch_assoc()){
			echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td></tr>";
		}

		//end table tag
		echo "</table>";

		//free the result set
		$result->free();
	}
	
	// close connection 
	$conn->close();
?>