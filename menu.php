<html>
	<head>
            
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<title>
			<?php
				echo $headtitle;
			?>
		</title>

        </head>

<body>

<div class="container" >

<!-- Page header -->
<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1> <?php echo $headtitle?> </h1>
	<ul class="nav nav-pills">

    <!-- MenuBar --> 

    <li<?php if($menuHighlight == 0) { echo ' class="active"';} ?>> <a href="paycheck.php">Enter Paycheck</a></li>

    <li<?php if($menuHighlight == 1) { echo ' class="active"';} ?>> <a href="add_Hours.php">Add Hours</a></li>

    <li<?php if($menuHighlight == 2) { echo ' class="active"';} ?>> <a href="add_employer.php">Add Job</a></li>
    
    <li<?php if($menuHighlight == 3) { echo ' class="active"';} ?>> <a href="paycheck_history.php">Paycheck History</a></li>
    
    <li<?php if($menuHighlight == 4) { echo ' class="active"';} ?>> <a href="logout.php">Sign Out</a></li>
    
         </ul> 
 
</div>
</div>
</div>