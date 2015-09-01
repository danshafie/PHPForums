<html>
<head>
	<title>Edit Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style type="text/css">
	button{
		float: right;
	}
	.container{
		margin: 15px auto;
	}
	textarea{
		margin-top: 25px;
	}
	.footer{
		margin-top: 40px;
		border: 2px solid black;
		padding-bottom: 5px;
	}
	.footerbutton{
		margin-top: 5px;
	}

	.edit{
		border: 2px solid black;
		padding-bottom: 5px;
	}
	.change {
		border: 2px solid black;
		padding-bottom: 5px;
	}
</style>			
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left"><a href="normal_dashboard">Dashboard</a></h2>
	    <h2 class="navbar-text navbar-left">Profile</h2>
	    <h4 class="navbar-right"><a href="/main/logoff">Log Off</a></h4>
	  </div>
	</nav>


	<div class="container">

		<?php 
			if($this->session->flashdata('edit_errors'))
			{
				echo $this->session->flashdata('edit_errors');
			}
		 ?>

	<h2>Edit Profile</h2>	
		<div class="row">
			<div class="col-md-6 edit">
				<h3>Edit Info</h3>
				<form action="/main/edit_info/<?= $this->session->userdata['user_id']  ?>" method="post" class="inline">
				  <div class="form-group">
				    <label>Email address</label>
				    <input type="email" class="form-control" placeholder="email_address of the user" name="email">
				  </div>
				  <div class="form-group">
				    <label >First Name</label>
				    <input type="text" class="form-control" placeholder="first_name of the user" name="first_name">
				  </div>
				  <div class="form-group">
				    <label>Last Name</label>
				    <input type="text" class="form-control" placeholder="last_name of the user" name="last_name">
				  </div>
				  <input type="submit" class="btn btn-success" value="Save">
				</form>
			</div>

			<div class="col-md-5 col-md-offset-1 change">
				<h3>Change Password</h3>
				<form action="/main/edit_user_password/<?= $this->session->userdata['user_id']  ?>" method="post" class="inline">
				  <div class="form-group">
				    <label>Password</label>
				    <input type="text" class="form-control" name="password">
				  </div>
				  <div class="form-group">
				    <label >Confirm Password</label>
				    <input type="text" class="form-control" name="confirm">
				  </div>
				  <input type="submit" class="btn btn-success" value="Update Password"></button>
				</form>
			</div>
		</div>

	</div>	

</body>
</html>