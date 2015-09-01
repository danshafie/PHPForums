<html>
<head>
	<title>Show User Id Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	
<style type="text/css">
	.butt{
		float: right;
		margin: 5px;
	}



</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <h2 class="navbar-left">Test App</h2>
	    <h2 class="navbar-text navbar-left"> <a href="/main/dashboard">Dashboard</a></h2>
	    <h2 class="navbar-text navbar-left">Profile</h2>
	    <h4 class="navbar-right"><a href="/main/logoff	">Log Off</a></h4>
	  </div>
	</nav>

	<div class="container">
		<h2><?= $info['first_name']  ?></h2>
		<p>Registered at: <?= $info['created_at']  ?></p>
		<p>User ID: <?= $info['id']  ?></p>
		<p>Email address: <?= $info['email'] ?></p>
		

		<h3>Leave a message for <?= $info['first_name'] ?>!</h3>
		<form action="/Wall/insert_post" method="post" class="mbox">
			<textarea class="form-control" rows="3" name="message"></textarea>
			<input type="submit" class="btn btn-primary butt" value="Post">
			<input type="hidden" name="created_for" value="<?= $info['id']  ?>">
			<input type="hidden" name="created_by" value="<?= $this->session->userdata['user_id'] ?>">
			<input type="hidden" name="user_id" value="<?= $this->session->userdata['user_id']  ?>">
		</form>

		<?php foreach($messages as $message) { ?>
		<a href="/wall/wall/<?= $message['created_by']?>"><?= $message['created_by']  ?></a> wrote:
		<textarea class="form-control comment" rows="1" cols="50"><?= $message['content']  ?></textarea>
		 
		 <?php foreach($comments as $comment){
		 		if($message['id'] == $comment['message_id']){ ?>

		 		<a href="/wall/wall/<?= $comment['created_by']?>"><?= $comment['created_by']  ?></a> wrote:
		<textarea class="form-control comment" rows="1" cols="50"><?= $comment['content']  ?></textarea>



		 		<?php } ?>	
		<?php } ?>

		<form action="/wall/insert_comment" method="post">
			<textarea class="form-control comment" rows="1" cols="50" name="comment"></textarea>
			<input type="submit" class="btn btn-success butt" value="Comment">
			<input type="hidden" name="created_for" value="<?= $info['id'] ?>">
			<input type="hidden" name="created_by" value="<?= $this->session->userdata['user_id'] ?>">
			<input type="hidden" name="message_id" value="<?= $message['id']  ?>">
			<input type="hidden" name="user_id" value="<?= $this->session->userdata['user_id'] ?>">
		</form> 
		<?php } ?>

	</div>

</body>
</html>