<?php
	//include_once('adminPermissions.php');
	$menuHighlight=0; 
	$headtitle="Edit Users";
	include_once('config.php');
	include_once('dbutils.php');
	include_once("adminMenu.php");
?>

<div class="row">
<div class="col-xs-12">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
		echo "\n <tr>";
		echo "<td><input type='text' name=UserID value='" . $row['UserID'] . "'></td>";
		echo "<td><input type='text' name=LastName value='" . $row['LastName'] . "'></td>";
		echo "<td><input type='text' name=FirstName value='" . $row['FirstName'] . "'></td>";
		echo "<td><input type='text' name=email value='" . $row['email'] . "'></td>";
		echo "<td><input type='text' name=UserPerm value='" . $row['UserPerm'] . "'></td>";
		echo "<td><button type='submit' class='btn btn-default' name='submit'>Edit</button></td>";
		echo "</tr>";
	}
?>

</tbody>
</table>
</form>
</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>