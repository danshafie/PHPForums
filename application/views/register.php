<html>
<head>
	<title>Register Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style type="text/css">
	form{
		width: 50%;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left"><a href="/">Home</a></h2>
	    <h4 class="navbar-right"><a href="signin">Sign In</a></h4>
	  </div>
	</nav>
	<div class="container">
		<?php 
			if($this->session->flashdata("registration_errors"))
			{
				echo $this->session->flashdata("registration_errors");
			}

			if($this->session->flashdata("registration_success"))
			{
				echo $this->session->flashdata("registration_success");
			}
		 ?>
		<h3>Register</h3>
		<form action="/main/register_user" method="post">
		  <div class="form-group">
		    <label>Email address</label>
		    <input type="email" class="form-control" placeholder="Enter email" name="email">
		  </div>
		  <div class="form-group">
		    <label >First Name</label>
		    <input type="text" class="form-control" placeholder="First Name" name="first_name">
		  </div>
		  <div class="form-group">
		    <label>Last Name</label>
		    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
		  </div>
		  <div class="form-group">
		    <label>Password</label>
		    <input type="text" class="form-control" placeholder="Password" name="password">
		  </div>
		  <div class="form-group">
		    <label>Confirm Password</label>
		    <input type="text" class="form-control" placeholder="Password Confirmation" name="confirm">
		  </div>
		  <input type="submit" class="btn btn-success">
		</form>
		<a href="signin">Already have an account? Sign in!</a>
	</div>
</body>
</html>