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
        <h1>Successfully Registered</h1>
        <h2>We start on 26th March at --:-- PM</h2> 
 
<?php  /*      <a href="login_page.php" role="button" class="btn btn-lg btn-primary">Login</a>*/	?>
        <a href="index.php" role="button" class="btn btn-lg btn-primary">Treasure Hunt</a>
    </div>



	</body>
</html>
