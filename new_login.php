<?php include 'configuration/config.php'?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ecommerce Website</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="admin/ajax_requests.php">
			 <?php $errors = array();
			 if(isset($_SESSION['errors'])){
				
				include 'partials/errors.php';
			 }
			 ?>
			 
    
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="username"  required="" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="new_signup.php">Sign up</a>
  	</p>
  </form>
</body>
</html>