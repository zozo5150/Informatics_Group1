<?php
	include_once('adminPermissions.php');
	$menuHighlight=0; 
	$headtitle="Edit Users";
	include_once('config.php');
	include_once('dbutils.php');
	include_once("adminMenu.php");
?>

<?php
if (isset($_POST['submit'])) {

	// get data from the input fields
	$UserID = $_POST['UserID'];
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$email = $_POST['email'];
	$UserPerm = $_POST['UserPerm'];
	

	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "UPDATE Users SET LastName='$LastName', FirstName='$FirstName', email='$email', UserPerm='$UserPerm' WHERE UserID='$UserID';";
	
	$result = queryDB($query, $db);

	header('Location: adminUsers.php');
}
if (isset($_POST['delete'])) {
	
	$UserID = $_POST['UserID'];
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "DELETE FROM Users WHERE UserID='$UserID';";
	
	$result = queryDB($query, $db);

	header('Location: adminUsers.php');
}

?>

<div class="row">
<div class="col-xs-12">

<table class="table table-hover">

<!-- Titles for table -->
<thead>
<tr>
	<th>UserID</th>
	<th>Last Name</th>
	<th>First Name</th>
	<th>Email</th>
	<th>Permissions</th>
	<th></th>
</tr>
</thead>
<tbody>

<?php
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "SELECT UserID, LastName, FirstName, email, UserPerm FROM Users ORDER BY LastName;";
	
	// run the query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "<form action='". $_SERVER['PHP_SELF']."' method='post'>";
		echo "<tr>";
		echo "<td><input type='text' name=UserID value='" . $row['UserID'] . "'></td>";
		echo "<td><input type='text' name=LastName value='" . $row['LastName'] . "'></td>";
		echo "<td><input type='text' name=FirstName value='" . $row['FirstName'] . "'></td>";
		echo "<td><input type='text' name=email value='" . $row['email'] . "'></td>";
		echo "<td><input type='text' name=UserPerm value='" . $row['UserPerm'] . "'></td>";
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