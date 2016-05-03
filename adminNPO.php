<?php
	include_once('adminPermissions.php');
	$menuHighlight=2; 
	$headtitle="Register NPO";
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
	include_once("adminMenu.php");
?>
<html>

<?php
// Back to PHP to perform the search if one has been submitted
if (isset($_POST['submit'])) {

	// get data from the input fields
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	// check to make sure we have an email
	if (!$email) {
		punt("Please enter a name");
	}

	if (!$password1) {
		punt("Please enter a password");
	}

	if (!$password2) {
		punt("Please enter your password twice");
	}
	
	if ($password1 != $password2) {
		punt("Your two passwords are not the same");
	}

	// check if email already in database
		// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "SELECT email FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if the email is there
	if (nTuples($result) > 0) {
		punt("The email address $email already exists");
	}
	
	// generate hashed password
	$hashedPass = crypt($password1, getSalt());
	
	// set up my query
	$query = "INSERT INTO Users(LastName, FirstName, email, hashedPass, UserPerm) VALUES ('$lastname', '$firstname', '$email', '$hashedPass', 1);";
	
	// run the query
	$result = queryDB($query, $db);
	
	//Go to add job page
	header('Location: adminNPO.php');
	
	
}

?>

<!-- Form to enter Users -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div class="form-group">
	<label for="fname">First Name</label>
	<input type="text" class="form-control" name="fname"/>
</div>

<div class="form-group">
	<label for="lname">Last Name</label>
	<input type="text" class="form-control" name="lname"/>
</div>

<div class="form-group">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email"/>
</div>

<div class="form-group">
	<label for="password1">Password</label>
	<input type="password" class="form-control" name="password1"/>
</div>

<div class="form-group">
	<label for="password2">Please enter password again</label>
	<input type="password" class="form-control" name="password2"/>
</div>

<button type="submit" class="btn btn-warning" name="submit">Register</button>

</form>

</div>
</div>


</div> <!-- closing bootstrap container -->
</body>
</html>
