	<html>
<head>
	<title>New User Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	
<style type="text/css">
	.dash{
		float: right;
	}
	.enter{
		margin-top: 20px;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left">Dashboard</h2>
	    <h2 class="navbar-text navbar-left">Profile</h2>
	    <h4 class="navbar-right"><a href="/main/logoff">Log Off</a></h4>
	  </div>
	</nav>
	<div class="container">
		
		<?php 
			if($this->session->flashdata("new_user_error"))
			{
				echo $this->session->flashdata("new_user_error");
			}
		 ?>


		<h3>Add a new user</h3>
		
		<form action="/main/admin" method="post">
			<input type="submit" class="btn btn-primary dash" value="Return to Dashboard">
		</form>
		
		<form action="/main/create_user" method="post">
		  <div class="form-group">
		    <label>Email Address:</label>
		    <input type="email" class="form-control" placeholder="Enter email" name="email">
		  </div>
		  <div class="form-group">
		    <label >First Name:</label>
		    <input type="text" class="form-control" placeholder="First Name" name="first_name">
		  </div>
		  <div class="form-group">
		    <label>Last Name:</label>
		    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
		  </div>
		  <div class="form-group">
		    <label>Password:</label>
		    <input type="text" class="form-control" placeholder="Password" name="password">
		  </div>
		  <div class="form-group">
		    <label>Confirm Password:</label>
		    <input type="text" class="form-control" placeholder="Password Confirmation" name="confirmation">
		  </div>
		  <div class="form-group">
		  	<label>User Level:</label>
			<select class="form-control" name="user_level">
			  <option>Normal</option>
			  <option>Admin</option>
			</select>
		  <input type="submit" class="btn btn-success enter" value="Create">
		</form>

	</div>

</body>
</html>