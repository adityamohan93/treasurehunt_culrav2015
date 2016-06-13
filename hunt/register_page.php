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
					<h3 class="panel-title">REGISTER</h3>
				</div>
				<div class="panel-body">
                    <form role="form" name="register" action="register.php" method="post">
                        <div class="form-group">
                        	<input id="fname" type="text" name="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                        	<input id="lname" type="text" name="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                        	<input id="clg" type="text" name="clg" class="form-control" placeholder="College" required>
                        </div>
                        <div class="form-group">
                        	<input id="regn" type="text" name="regn"  class="form-control" placeholder="Registration No.(if MNNIT)">
                        </div>
                        <div class="form-group">
                        	<input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                        	<input id="uname" type="text" name="uname" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                        	<input id="pass" name="pass" type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-default">REGISTER</button>
                    </form>
				</div>
			</div>
		</div>

	</body>
</html>
