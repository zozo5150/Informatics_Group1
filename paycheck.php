
<html>
<head>
	<title>
		Enter Paycheck
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	

        <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>

</head>

<body>

<div class="container" >

<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1> Enter Paycheck </h1>
	<p><a href="login.php" class="btn btn-primary" role="button">Login</button></a></p>
</div>
</div>
</div>


<div align="center" >
<select name="Select Job">
  <option value="volvo">Job 1 - University of Iowa</option>
  <option value="saab">Job 2 - Best Buy</option>
</select>
</div>
 
<div class="form-group">
	<label for="password1">Enter Paycheck Start Date</label>
	<input type="date" class="form-control" name="fname"/>
</div>

<div class="form-group">
        <label for="password1">Enter Paycheck End Date</label>
	<input type="date" class="form-control" name="lname"/>
</div>


<div class="form-group">
	<label for="password1">Password</label>
	<input type="password" class="form-control" placeholder="Password (Case Sensitive)"name="password1"/>
</div>

<div class="form-group">
	<label for="password2">Please enter password again</label>
	<input type="password" class="form-control" placeholder="Password (Case Sensitive)" name="password2"/>
</div>


<button type="submit" class="btn btn-default" name="submit">Enter</button>


</body>
</html>
