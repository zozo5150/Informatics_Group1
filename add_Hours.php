<?php
	include_once("dbutils.php");
	include_once("config.php");
	$menuHighlight=1; 
	$headtitle="Enter Hours";
	session_start();
	$email= $_SESSION['email'];
	include_once("jobList.php");
	include_once("menu.php");
?>

<?php
if (isset($_POST['submit'])) {

	// get data from the input fields
	$date = $_POST['date'];
	$hours = $_POST['hours'];
	$JobID = $_POST['job'];
	
	
	// check to make sure we have an email
	if (!$date) {
		header("Location: add_Hours.php");
	}
	
	if (!$hours) {
		header("Location: add_Hours.php");
	}

	// check if user has worked that date already
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	//$query = "SELECT workDate, JobID FROM Hours WHERE workDate='$date' AND JobID='$JobID';";
	
	// run the query
	//$result = queryDB($query, $db);
	
	//if ($result){
		//<script>
		//if (confirm('You have already added hours for this date, is this correct?')){
			// set up my query
			//$query = "INSERT INTO Hours(JobID, hoursReported, workDate) VALUES ('$JobID', '$hours', '$date');";
	
			// run the query
			//$result = queryDB($query, $db);
		//}
		//</script>
		//else{
			//header("Location: add_hours.php")
		//}
	//}
	//else{
		// set up my query
	$query = "INSERT INTO Hours(JobID, hoursReported, workDate) VALUES ('$JobID', '$hours', '$date');";
	
		 //run the query
	$result = queryDB($query, $db);
	//}
	
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div class="container" >


<div class="form-group">
	<label for="job">Employer</label>
	<select class="form-control" name="job">
	<?php echo $jobOptions; ?>
	</select>
</div>
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

</form>
</div>
</body>
</html>
