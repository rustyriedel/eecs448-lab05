<?php
	//get the user_id field
 	$id = $_POST['user_id'];

 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}

	//check if user_id field was empty
	if ($id == ''){
 		echo "Empty user id!";
 	}
 	else {
 		//build command to add user id into Users table
		$insert = "INSERT INTO Users (user_id) VALUES ('" . $id . "')";
		
		//report if the user id was sucessfully inserted
		if ($conn->query($insert) === TRUE){
			echo "New user " . $id . " was created successfully!";
		}
		else{
			//output error message because insertion failed
			echo "ERROR: " . $insert . "<br>" . $conn->error;
		}
 	}

	// close connection 
	$conn->close();
?>