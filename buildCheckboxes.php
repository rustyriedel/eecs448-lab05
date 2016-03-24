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
	if ($result = $conn->query("SELECT * FROM Posts ORDER BY author_id ASC")){
		
		//make select option tags
		while ($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td><input type='checkbox' name='ids[]' value='" . $row["post_id"] . "'></td>";
			//<input type="checkbox" name="vehicle" value="Car">
			echo "<td>" . $row["author_id"] . "</td>";
			echo "<td>" . $row["content"] . "</td>";
			echo "</tr>";
		}

		//free the result set
		$result->free();

	}
	
	//close connection 
	$conn->close();
?>