<?php
	session_start();
	if(isset($_SESSION['id']))
	{
		header('Location: ./play.php');
		die();
	}	
?>

<html>
	<head>
		<title>Treasure Hunt</title>
        <?php include 'files.php'; ?>
	</head>
	<body>

		<?php include 'header.php';?>

		<div class="col-md-offset-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">LOGIN</h3>
				</div>
				<div class="panel-body">
					<form role="form" name="login" action="login.php" method="post">
						<div class="form-group">
							<input id="uname" name="uname" type="text" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input id="pass" name="pass" type="password" class="form-control" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-default">LOGIN</button>
					</form>
				</div>
			</div>
		</div>

	</body>
</html>
