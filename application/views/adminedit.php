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
	.dash{
		float: right;
		margin-bottom: 20px;
	}
</style>			
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left"><a href="/main/admin">Dashboard</a></h2>
	    <h2 class="navbar-text navbar-left">Profile</h2>
	    <h4 class="navbar-right"><a href="/main/logoff">Log Off</a></h4>
	  </div>
	</nav>


	<div class="container">
	
	<form action="/main/admin" method="post">
	<input type="submit" class="btn btn-primary dash" value="Return to dashboard">
	</form>

	<h1>Edit User - <?= $info['first_name'] . " " . $info['last_name'] ?> </h1>	
		
		<div class="row">
			<div class="col-md-6 edit">
				<h3>Edit Information</h3>
				<form action="/main/edit_user/<?= $info['id'] ?>" method="post" class="inline">
				  <div class="form-group">
				    <label>Email address:</label>
				    <input type="email" class="form-control" placeholder="email_address of the user" name="email">
				  </div>
				  <div class="form-group">
				    <label >First Name:</label>
				    <input type="text" class="form-control" placeholder="first_name of the user" name="first_name">
				  </div>
				  <div class="form-group">
				    <label>Last Name:</label>
				    <input type="text" class="form-control" placeholder="last_name of the user" name="last_name">
				  </div>
				  <div class="form-group">
				  	<label>User Level:</label>
					<select class="form-control" name="user_level">
					  <option>Admin</option>
					  <option>Normal</option>
					</select>
				 </div>
				 <input type="submit" class="btn btn-success" value="Save"></button>
				</form>
			</div>

			<div class="col-md-5 col-md-offset-1 change">
				<h3>Change Password</h3>
				<form action="/main/edit_password/<?= $info['id']?>" method="post" class="inline">
				  <div class="form-group">
				    <label>Password</label>
				    <input type="text" class="form-control" name="password">
				  </div>
				  <div class="form-group">
				    <label >Confirm Password</label>
				    <input type="text" class="form-control" name="confirm">
				  </div>
				  <input type="submit" class="btn btn-success" value="Update Password">
				</form>
			</div>
		</div>

	</div>	

</body>
</html>