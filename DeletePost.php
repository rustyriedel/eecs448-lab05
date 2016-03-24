<?php
 	//connect to the database
	$conn = new mysqli("mysql.eecs.ku.edu", "rriedel", "Password123!", "rriedel");

	//check connection
	if ($conn->connect_errno) {
	    printf("Connect failed: %s\n", $conn->connect_error);
	    exit();
	}

	//counter that keeps track of posts deleted
	$numPostsDeleted = 0;

	//header for the output page
	echo "<h1>Deleted Posts</h1>post_id<br>";

	//get selected checkboxes and remove post from Posts table
	foreach ($_POST['ids'] as $id) {
		//build string to remove post from database
		$remove = "DELETE FROM Posts WHERE post_id = '" . $id . "'";

		//remove post from database
		if($result = $conn->query($remove)){
			echo $id . "<br>";
		}

		//increment counter
		$numPostsDeleted++;
	}

	//if no posts were deleted, output that no posts were selected for deletion
	if($numPostsDeleted == 0){
		echo "No posts were selected for deletion!";
	}

	// close connection 
	$conn->close();
?>