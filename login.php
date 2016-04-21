<?php
	include_once('config.php');
	include_once('dbutils.php');
	include_once('hashutil.php');
?>

<?php
// Back to PHP to perform the search if one has been submitted.

if (isset($_POST['submit'])) {

	// get data from the input fields
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	
	// check to make sure we have an email
	if (!$email) {
		header("Location: login.php");
	}
	
	if (!$password) {
		header("Location: login.php");
	}

	// check if user is in the database
	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	// set up my query
	$query = "SELECT email, hashedPass, UserPerm FROM Users WHERE email='$email';";
	
	// run the query
	$result = queryDB($query, $db);
	
	
	// check if the email is there
	if (nTuples($result) > 0) {
		$row = nextTuple($result);
		
		if ($row['hashedPass'] == crypt($password, $row['hashedPass'])) {
			session_start();
			// Password is correct
			if (session_start()) {
				$_SESSION['UserPerm'] = $row['UserPerm'];
				$_SESSION['UserID'] = $row['UserID'];
				if ($row['UserPerm'] == 0){
					header('Location: paycheck.php');
				}
				if ($row['UserPerm'] == 1){
					header('Location: adminUsers.php');
				}
			} else {
				punt("Unable to create session");
			}
		} else {
			// Password is not correct
			header("Location: login.php");
		}
	} else {
		punt("The account with email '$email' does not exist");
	}	
	
}

?>

<html>
<head>
	<title>
		Home - Login
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
	<h1> Wage Theft Prevention </h1>
</div>
</div>
</div>


<!-- Form to enter club teams -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
	<label for="email">Email</label>
	<input type="email" class="form-control" name="email"/>
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password"/>
</div>

<!-- <button type="submit" class="btn btn-default" name="submit">Login</button> -->
<button type="submit" class="btn btn-primary" name="submit">Login</button>
<a href="register.php" class="btn btn-warning" role="button">Register</a>


</form>

</div>
</div>


</div> <!-- closing bootstrap container -->
</body>
</html>
