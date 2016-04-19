<?php
	$menuHighlight=1; 
	$headtitle="Enter Paycheck";
	include_once("menu.php");
?>
<?php
if (isset($_POST['submit'])) {

	// get data from the input fields
	$date = $_POST['date'];
	$hours = $_POST['hours'];
	
	
	
	// check to make sure we have an email
	if (!$date) {
		header("Location: add_hours.php");
	}
	
	if (!$hours) {
		header("Location: add_hours.php");
	}

	// check if user has worked that date already
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "SELECT workDate, JobID FROM Hours WHERE workDate='$date' AND JobID='$JobID';";
	
	// run the query
	$result = queryDB($query, $db);
	
	if ($result){
		if (confirm('You have already added hours for this date, is this correct?')){
			// set up my query
			$query = "INSERT INTO Hours(JobID, hoursReported, workDate) VALUES ('$JobID', '$hours', '$date');";
	
			// run the query
			$result = queryDB($query, $db);
		}
		else{
			header("Location: add_hours.php")
		}
	}
	else{
		// set up my query
		$query = "INSERT INTO Hours(JobID, hoursReported, workDate) VALUES ('$JobID', '$hours', '$date');";
	
		// run the query
		$result = queryDB($query, $db);
	}
	
}

?>

<html>
<head>
	<title>
		Enter Hours
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	

        <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>

</head>

<body>

<div class="container" >


<div align="center" >
<select name="Select Job">
  <option value="volvo">Job 1 - University of Iowa</option>
  <option value="saab">Job 2 - Best Buy</option>
</select>
</div>
 
<div class="form-group">
	<label for="date">Enter Date Worked</label>
	<input type="date" class="form-control" name="date"/>
</div>


<div class="form-group">
	<label for="hours">Enter Hours Worked</label>
	<input type="text" class="form-control" placeholder="Ex) 245.23 "name="hours"/>
</div>


<button type="submit" class="btn btn-default" name="submit">Enter</button>


</body>
</html>
