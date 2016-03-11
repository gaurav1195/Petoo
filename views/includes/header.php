<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Petoo</title>
	<link rel = "stylesheet" href="css/style.css" type="text/css" media="screen" charset = "utf-8">
	<script src=" http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/bootstrap.min.css"  rel="stylesheet" > 
	
</head>
<?php ob_start(); ?>
<body>

	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style='color:white'>Petoo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="left"><a href="#">Offers <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Track your orders</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" style="color:white;align:right;text-align:right"><?php echo 'Welcome' . '  ' . $name; ?></a></li>
        <li><a href="index.php/logout" style="color:white;align:right;text-align:right">Logout</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>