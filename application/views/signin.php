<html>
<head>
	<title>Sign In Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	form {
		width: 50%;
	}
</style>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<h2 class="navbar-left">Test App</h2>
	   		<h2 class="navbar-text navbar-left"><a href="/">Home</a></h2>
	    	<h4 class="navbar-right"><a href="">Sign In</a></h4>
		</div>
	</nav>	
	
	<div class="container">
	<?php 
		if($this->session->flashdata("login_errors"))
		{
			echo $this->session->flashdata('login_errors');
		}
	 ?>
	<h3>Sign In</h3>
	<form action="/main/login_user" method="post">
	  <div class="form-group">
	    <label>Email Address</label>
	    <input type="text" class="form-control" placeholder="Email" name="email">
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="password" class="form-control" placeholder="Password" name="password">
	  </div>
	  <input type="submit" class="btn btn-success">
	</form>
	<a href="/main/register">Don't have an account? Register</a>	
	</div>

</body>
</html>