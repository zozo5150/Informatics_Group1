
<?php
	$menuHighlight=3; 
	$headtitle="Paycheck History";
	include_once("menu.php");
?>


<html>

<head>
	<title>
		<?php echo $title; ?>
	</title>
	
	<!-- This is the code for using Bootstrap, linking to Bootstrap's css and javascript -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	
</head>


<body>
	<div class="container">

	<!-- Header -->
	<div class="row">
	<div class="col-sm-12">
	<div class="page-header">
		<h1><?php echo $title; ?></h1>
	</div>
	</div>
	</div>
	
	
	<div class="row">
            <div class="col-sm-9 col-xs-9">
            <!-- Content-->
            <p>
              
	     <!--titles for table --> 
	<table> 
		<tr> 
		<td> Artist Name </td> 
		<td> Song Title </td> 
		<td> Song Year </td> 
		</tr> 
	</table>
	        
            </p>
		
		
	</div>
	</body>
	
	
