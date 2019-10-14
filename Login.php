<?php include('configDB.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="assets/css/Styles.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
    <a class="navbar-brand" href="Login.php">Blog Management</a>
    <div class "box1"> 
    <a class ="box1" href="Login.php"> Return to blog</a>
    </div>
  </div>
</nav>
<div class="box">
<form method="post" action="Login.php">
    <?php include('errors.php'); ?>
<label for="Username">Username</label>
<input type="Username" class="form-control" name="Username" placeholder="Enter Username">
<label for="Password">Password</label>
<input type="Password" class="form-control" name="Password" placeholder="Password">
<br>
<button type="submit" class="btn btn-primary" style="background-color:#2D9CDB;width: -webkit-fill-available" name="log":>Proceed to login</button>
</form>
</body>
</div>
</html>