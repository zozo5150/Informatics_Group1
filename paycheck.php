
<?php
	include_once("dbutils.php");
	include_once("config.php");
	$menuHighlight=0; 
	$headtitle="Enter Paycheck";
	session_start();
	$email= $_SESSION['email'];
	include_once("jobList.php");
	include_once("menu.php");
?>

<?php

if (isset($_POST['submit'])) {
	// get data from the input fields
	$jobID = $_POST['job'];
	$hours = $_POST['hours'];
	$amount = $_POST['amount'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	
	
	// check to make sure we have an email
	if (!$jobID) {
		header("Location: login.php");
	}
	
	if (!$hours) {
		header("Location: login.php");
	}

	// check if user has worked that date already
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "INSERT INTO Paycheck(JobID, PaycheckHours, PayStart, PayEnd, AmountPaid) VALUES ('$jobID', '$hours', '$startDate', '$endDate', '$amount');";
	
	// run the query
	$result = queryDB($query, $db);
	
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
	<label for="startDate">Enter Paycheck Start Date</label>
	<input type="date" class="form-control" name="startDate"/>
</div>

<div class="form-group">
        <label for="endDate">Enter Paycheck End Date</label>
	<input type="date" class="form-control" name="endDate"/>
</div>


<div class="form-group">
	<label for="amount">Enter Paycheck Amount</label>
	<input type="text" class="form-control" placeholder="Ex) 245.23 "name="amount"/>
</div>

<div class="form-group">
	<label for="hours">Enter Paycheck Hours</label>
	<input type="text" class="form-control" placeholder="Ex) 48.00" name="hours"/>
</div>


<button type="submit" class="btn btn-default" name="submit">Enter</button>
</form>
</div>
</div>
</body>
</html>
