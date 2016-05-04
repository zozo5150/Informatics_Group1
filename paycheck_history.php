
<?php
	$menuHighlight=3; 
	$headtitle="Paycheck History";
	include_once('config.php');
	include_once('dbutils.php');
	include_once("jobList.php");
	include_once("menu.php");
?>

<div class="row">
<div class="col-xs-12">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div class="container" >


<div class="form-group">
	<label for="job">Select Employer</label>
	<select class="form-control" name="job">
	<?php echo $jobOptions; ?>
	</select>
</div>
</div>
<button type="submit" class="btn btn-default" name="submit">Select</button>
</form>

<hr>
<table class="table table-hover">



<?php
if (isset($_POST['submit'])) {
	
	$JobID=$_POST['job'];
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "SELECT Employer.employer FROM Employer, Jobs WHERE Employer.EmployerID = Jobs.EmployerID AND Jobs.JobID='$JobID';";
	$result = queryDB($query, $db);
	
	$employer = "";
	if ($row = nextTuple($result)) {
		$employer = $row['employer'];
	}
	
	echo "<p><h4>$employer" . ": Hours reported and paycheck information</h4></p>";
	
	echo "
	<!-- Titles for table -->
<thead>
<tr>
	<th>Date Range</th>
	<th>Hours Reported</th>
	<th>Hours On Paycheck</th>
	<th>Amount Paid</th>
	<th> </th>
</tr>
</thead>
<tbody>
	";
		
	$UserID = $_SESSION['UserID'];
	// set up my query for paycheck
	$query = "SELECT PaycheckID, PayStart, PayEnd, PaycheckHours, Claim, AmountPaid FROM Paycheck WHERE JobID='$JobID';";
	
	// run the query
	$result = queryDB($query, $db);
	
	
	while($row = nextTuple($result)) {
		echo "<tr>";
		
		//show range of dates
		echo "<td>".$row['PayStart']."-".$row['PayEnd']."</td>";
		
		//NOT WORKING
		//sum hours in a period
		$query= "SELECT SUM(hoursReported) as h FROM Hours WHERE JobID='$JobID' AND (workDate BETWEEN '".$row['PayStart']."' AND '".$row['PayEnd'] . "');";
		$hoursResult = queryDB($query, $db);
		$hoursReported = 0;
		if ($rowHours = nextTuple($hoursResult)) {
			$hoursReported = $rowHours['h'];
			if ($hoursReported == NULL) {
				$hoursReported = 0;
			}
		}
		
		echo "<td>".$hoursReported."</td>";
		
		
		echo "<td>".$row['PaycheckHours']."</td>";
		echo "<td>$".$row['AmountPaid']."</td>";
		
		$claimlink = " ";
		if ($row['Claim'] == FALSE) {
			$claimlink = "<a href='makeclaim.php?PaycheckID=" . $row['PaycheckID'] . "'>Make a claim</a>";
		}
		
		echo "<td>" . $claimlink .  "</td>";
		
		//if being underpaid, give option to submit claim
		//if($wage*$hours)!>=$row['AmountPaid']{
			//echo "<td><a href='claim.php'><img src='flag_red.png' alt='File Claim' width='20' height='20'></a></td>";
		//}
		//else{
			//echo "<td><img src='check_mark.png' alt=''></td>";
		//}
		echo "</tr>";
		echo "</form>";
	}
}
?>

</tbody>
</table>

</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>