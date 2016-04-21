<?php
	// Generating pull down menu for jobs
	
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	//get employerID
	$query = "SELECT UserID FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	$row = nextTuple($result);
	
	$UserID = $row["UserID"];
	
	// set up my query
	$query = "SELECT j.JobID AS JobID, e.employer AS employer FROM Employer e, Jobs j WHERE j.EmployerID= e.EmployerID AND j.UserID= '$UserID';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for artists
	$jobOptions = "";
	
	// go through all artists and put together pull down menu
	while ($row = nextTuple($result)) {
		$jobOptions .= "\t\t\t";
		$jobOptions .= "<option value='";
		$jobOptions .= $row['JobID'] . "'>" . $row['employer'] . "</option>\n";
	}
?>