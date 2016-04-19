<?php
	$menuHighlight=2; 
	$headtitle="Enter Employer";
	include_once("menu.php");
	$UserID= $_SESSION['UserID'];
?>

<html>
<head>
	<title>
		Add Employer
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
	<h1> Enter Employer </h1>
	<p><a href="login.php" class="btn btn-primary" role="button">Login</button></a></p>
</div>
</div>
</div>

 
<div class="form-group">
	<label for="password1">Enter Employer Name</label>
	<input type="input" class="form-control" Placeholder="Ex) The University of Iowa " name="fname"/>
</div>

<div class="form-group">
        <label for="streetaddress">Enter Employer Street Address" </label>
        <input type="input" class="form-controL" placeholder="Ex) 108 Calvin Hall" />
        
<div class="form-group">
	<label for="password1">Enter Employer City</label>
	<input type="input" class="form-control" Placeholder="Ex) Iowa City" name="fname"/>
</div>

<div class="form-group">
        <label for="employerstate"> Enter Employer State: </label> 
</div>

<div class="form-group">
	
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

<label for="zip">US Zip code</label>
<input id="zip" name="zip" pattern="[\d]{5}(-[\d]{4})" placeholder="Ex) xxxxx" >


<button type="submit" class="btn btn-default" name="submit">Enter</button>


</body>
</html>
