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
        <title>Treasure Hunt | Culrav 2015</title>
        <?php include 'files.php'; ?>
		<? /*php include 'confetti.php'; */?>
    </head>
    <body>

<!--<canvas id="canvas"></canvas>-->

    <?php include 'header.php';?>


    <div id= "maindisplay" class="container text-center">
        <h1>TREASURE HUNT</h1>
  
     <a href="pageforlogin.php" role="button" class="btn btn-lg btn-primary">Login</a>
        <a href="register_page.php" role="button" class="btn btn-lg btn-primary">Register</a>
    </div>



	</body>
</html>
