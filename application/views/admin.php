<html>
<head>
	<title>Admin Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	
</head>
<style type="text/css">
	.add{
		float: right;
		margin-bottom: 20px; 
	}
</style>
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
		
		<h3>Manage Users</h3>

		<?php 
				if($this->session->flashdata("update_errors"))
				{
					echo $this->session->flashdata("update_errors");
				}

				if ($this->session->flashdata("update_success"))
				{
					echo $this->session->flashdata("update_success");
				}

				if($this->session->flashdata("new_user_create"))
				{
					echo $this->session->flashdata("new_user_create");
				}

				if($this->session->userdata['user_level'] != 'admin')
				{
					redirect('/');
				}
			 ?>
		
		<form action="/main/new_page" method="post">
			<input type="submit" class="btn btn-primary add" value="Add New">
		</form>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>email</th>
				<th>created_at</th>
				<th>user_level</th>
				<th>actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user) { ?>
			<tr>
				<td><?= $user['id'] ?></td>
				<td><a href="/wall/wall/<?=$user['id']  ?>"><?= $user['first_name'] . " " . $user['last_name']  ?></a></td>
				<td><?= $user['email'] ?></td>
				<td><?= $user['created_at'] ?></td>
				<td><?= $user['user_level'] ?></td>
				<td><a href="/main/admin_edit/<?= $user['id'] ?>">edit</a> | <a href="/main/remove/<?= $user['id'] ?>">remove</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	




	</div>
</body>
</html>