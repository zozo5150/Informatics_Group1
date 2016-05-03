<?php
	//include_once('adminPermissions.php');
	$menuHighlight=1; 
	$headtitle="Edit Employers";
	include_once('config.php');
	include_once('dbutils.php');
	include_once("adminMenu.php");
	
?>

<?php

if (isset($_POST['submit'])) {

	// get data from the input fields
	$employerID = $_POST['EmployerID'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	

	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "UPDATE Users SET employerName='$name', employerCity='$city', employerState='$state', employerZip='$zip' WHERE EmployerID='$EmployerID';";
	
	$result = queryDB($query, $db);

	header('Location: adminEmployers.php');
}
if (isset($_POST['delete'])) {
	
	$EmployerID = $_POST['EmployerID'];
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "DELETE FROM Employer WHERE EmployerID='$EmployerID';";
	
	$result = queryDB($query, $db);

	header('Location: adminEmployers.php');
}

?>

<div class="row">
<div class="col-xs-12">

<table class="table table-hover">

<thead>
<tr>
	<th>Employer ID</th>
	<th>Employer Name</th>
	<th>Employer City</th>
	<th>Employer State</th>
	<th>Employer Zip</th>
	<th></th>
</tr>
</thead>
<tbody>

<?php

	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "SELECT EmployerID, employer, employerCity, employerState, employerZip FROM Employer ORDER BY EmployerID;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "<form action='". $_SERVER['PHP_SELF']."' method='post'>";
		echo "<tr>";
		echo "<td><input type='text' name=EmployerID value='" . $row['EmployerID'] . "'></td>";
		echo "<td><input type='text' name=name value='" . $row['employerName'] . "'></td>";
		echo "<td><input type='text' name=city value='" . $row['employerCity'] . "'></td>";
		echo "<td><input type='text' name=state value='" . $row['employerState'] . "'></td>";
		echo "<td><input type='text' name=zip value='" . $row['employerZip'] . "'></td>";
		echo "<td><button type='submit' class='btn btn-default' name='submit'>Edit</button></td>";
		echo "<td><button type='submit' class='btn btn-default' name='delete'>Delete</button></td>";
		echo "</tr>";
		echo "</form>";
	}

?>

</tbody>
</table>

</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>