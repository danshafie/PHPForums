<html>
<head>
	<title>Dashboard Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>		
</head>
<body>

	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left">Dashboard</h2>
	    <h2 class="navbar-text navbar-left"><a href="/main/edit">Profile</a></h2>
	    <h4 class="navbar-right"><a href="logoff">Log Off</a></h4>
	  </div>
	</nav>
	
	<div class="container">

		<?php 
			if($this->session->flashdata('edit_success'))
			{
				echo $this->session->flashdata('edit_success');
			}
		 ?>
		<h3>All Users</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>email</th>
				<th>created_at</th>
				<th>user_level</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user) { ?>
			<tr>
				<td><?= $user['id']; ?></td>
				<td><a href="/Wall/wall/<?= $user['id']?>"><?= $user['first_name']; ?></a></td>
				<td><?= $user['email'];  ?></td>
				<td><?= $user['created_at']; ?></td>
				<td><?= $user['user_level'];?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>	




	</div>
</body>
</html>