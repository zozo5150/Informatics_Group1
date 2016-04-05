<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
?>
<html>
<head>
	<title>
		"Register"
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<body>

<div class="container">

<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1>"Register User "</h1>
	<p><a href="login.php">Login</a></p>
</div>
</div>
</div>

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
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "SELECT email FROM Employee WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if the email is there
	if (nTuples($result) > 0) {
		punt("The email address $email already exists");
	}
	
	// generate hashed password
	$hashedPass = crypt($password1, getSalt());
	
	// set up my query
	$query = "INSERT INTO Employee(LastName, FirstName, email, hashedPass) VALUES ('$lastname', '$firstname', '$email', '$hashedPass');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// tell users that we added the player to the database
	echo "<div class='panel panel-default'>\n";
	echo "\t<div class='panel-body'>\n";
    echo "\t\tAccount with email " . $email . " was added to the database\n";
	echo "</div></div>\n";
	
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

<button type="submit" class="btn btn-default" name="submit">Add</button>

</form>

</div>
</div>


</div> <!-- closing bootstrap container -->
</body>
</html>