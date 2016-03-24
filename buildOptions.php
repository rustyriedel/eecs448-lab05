<?php
	//This php code is just to create the html selection drop down options

 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
		printf("Connect failed: %s\n", $conn->connect_error);
		exit();
	}

	//query the database
	if ($result = $conn->query("SELECT * FROM Users ORDER BY user_id ASC")){
		
		//make select option tags
		while ($row = $result->fetch_assoc()){
			echo "<option value='" . $row["user_id"] . "'>" . $row["user_id"] . "</option>";
		}

		//free the result set
		$result->free();

	}
	
	//close connection 
	$conn->close();
?>