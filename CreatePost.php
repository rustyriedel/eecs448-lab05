<?php
	//get the form data
 	$author = $_POST['author_id'];
 	$content = $_POST['content'];

 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}

	//check if no content was entered
	if ($content == ''){
 		echo "No content was entered! The post was not created!";
 	}
 	else {
 		//check if author is existing user
 		$query= "SELECT * FROM Users WHERE user_id = '" . $author . "'";

 		//query the database
 		if ($result = $conn->query($query)){
 			$row = $result->fetch_assoc();

 			if ($row["user_id"]){
 				//the user is in the Users table, so add their post
 				//build command to add post to the Posts
				$insert = "INSERT INTO Posts (author_id, content) VALUES ('" . $author . "', '" . $content . "')";
				
				//report if the post was sucessfully inserted
				if ($conn->query($insert) === TRUE){
					echo "The post was created successfully!";
				}
				else{
					//output error message because insertion failed
					echo "ERROR: " . $insert . "<br>" . $conn->error;
				}

 			}
 			else{
 				echo "ERROR: Not a valid user!";
 			}

 			//free the result set
 			$result->free();
 		}

 	}

	// close connection 
	$conn->close();
?>