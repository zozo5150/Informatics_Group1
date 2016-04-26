<?php
	//include_once('adminPermissions.php');
	$menuHighlight=0; 
	$headtitle="Edit Users";
	include_once('config.php')
	include_once('dbutils.php')
	//include_once("adminMenu.php");
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
		echo "\n <tr>";
		echo "<td>" . $row['UserID'] . "</td>";
		echo "<td>" . $row['LastName'] . "</td>";
		echo "<td>" . $row['FirstName'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['UserPerm'] . "</td>";
		echo "<td>" . $row['FirstName'] . "</td>";
		echo "</tr>";
	}
?>

</tbody>
</table>
</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>