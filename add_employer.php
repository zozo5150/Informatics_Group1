<?php
	include_once("dbutils.php");
	include_once("config.php");
	$menuHighlight=2; 
	$headtitle="Enter Employer";
	include_once("menu.php");
	session_start();
	$email= $_SESSION['email'];
?>
<?php
if (isset($_POST['submit'])) {

	// get data from the input fields
	$employer = $_POST['name'];
	$employerCity = $_POST['city'];
	$employerState = $_POST['state'];
	$employerZip = $_POST['zip'];
	$Wage = $_POST['Wage'];

	// check to make sure we have all fields
	if (!$employer) {
		header("Location: add_employer.php");
	}
	

	// connect to database
	$db = connectDB($dbhost,$dbuser,$dbpasswd,$dbname);
	
	$query = "SELECT EmployerID, employer FROM Employer WHERE employer='$employer';";
	
	$result = queryDB($query, $db);

	if(nTuples($result) < 1){
		//insert into employer
		$query = "INSERT INTO Employer(employer, employerCity, employerState, employerZip) VALUES ('$employer', '$employerCity', '$employerState', '$employerZip');";
		$result = queryDB($query, $db);

		// ONCE THIS IS ADDED TO DB, YOU NEED TO GET A HANDLE
		// ON EmployerID FOR THE JUST ADDED EMPLOYER. MAY REQUIRE
		// ANOTHER QUERY/RETRIEVAL.
		$query = "SELECT EmployerID, employer FROM Employer WHERE employer='$employer';";
	
		$result = queryDB($query, $db);
	}
	
	// EMPLOYER EXISTS: GET EmployerID FROM THE QUERY THAT JUST RAN SUCCESSFULLY
	$row = nextTuple($result);
	$EmployerID = $row['EmployerID'];
	
	//insert into jobs
	$UserID = $_SESSION['UserID'];
	$query = "INSERT INTO Jobs(UserID, EmployerID, Wage) VALUES ('$UserID', '$EmployerID', '$Wage');";
	
	// run the query
	$result = queryDB($query, $db);
	
	header('Location: add_Hours.php');
}

?>
<!-- Form to enter Users -->
<div class="row">
<div class="col-xs-12">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<div class="form-group">
	<label for="name">Enter Employer Name</label>
	<input type="input" class="form-control" Placeholder="Ex) The University of Iowa " name="name"/>
</div>

        
<div class="form-group">
	<label for="city">Enter Employer City</label>
	<input type="input" class="form-control" Placeholder="Ex) Iowa City" name="city"/>
</div>



<div class="form-group" name="state">
	<label for="state"> Enter Employer State: </label>
	<select>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
</div>
	
<div class="form-group">
	<label for="zip">US Zip code</label>
	<input id="zip" name="zip" placeholder="Ex) xxxxx" >
</div>

<div class="form-group">
	<label for="Wage">Wage in dollars</label>
	<input id="Wage" name="Wage" placeholder="Ex) 9.35" >
</div>


<button type="submit" class="btn btn-default" name="submit">Enter</button>

</form>
</div>
</div>
</body>
</html>
