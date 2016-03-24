<?php
 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}
	echo "<h1>Users</h1>";
	
 	//build command to get users from database
	$query = "SELECT * FROM Users ORDER BY user_id ASC";
	
	//query the database
	if ($result = $conn->query($query)){
		//start table tag
		echo "<table>";

		//print results
		while ($row = $result->fetch_assoc()){
			echo "<tr><td>" . $row["user_id"] . "</td></tr>";
		}

		//free the result set
		$result->free();
	}
	
	// close connection 
	$conn->close();
?>