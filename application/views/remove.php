<html>
<head>
	<title>Remove Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<style type="text/css">
	form{
		display: inline-block;
		margin: 20px;
	}
</style>	
</head>
<body>
	<div class="container">
	

	<h1>Are you sure you want to remove this user?</h1>

	<form action="/main/delete/<?= $info['id']  ?>" method="post">
	  <div class="form-group">
	  <input type="submit" class="btn btn-primary but" value="Yes! I am sure"></button>
	  </div>
	</form>

	<form action="/main/admin" method="post">
	  <div class="form-group">
	  <input type="submit" class="btn btn-danger but" value="No!"></button>
	  </div>
	</form>




	</div>
</body>
</html>