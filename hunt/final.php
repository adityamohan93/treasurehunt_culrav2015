<?php
include("db_connect.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: ./index.php');die();
	}	
	$uid=htmlentities(mysqli_real_escape_string($conn,$_SESSION['id']));

	$query="SELECT * FROM level WHERE UID=\"$uid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	$y=$result['Last Answered'];
	
	if($y!=50)
	{
		$y++;
		header("Location: ./play.php?qid=".$y." ");die();
	}
	
	$query="SELECT * FROM final WHERE UID=\"$uid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	
	if($result['UID']==NULL)
	{
		if($uid!=1)
		{
			$query="INSERT INTO `final`(`UID`) VALUES ('$uid')";
			$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
		}
	}
?>
<html>
<head>
    <title>Treasure Hunt</title>
    <?php include 'files.php'; ?>
	<?php include 'confetti.php';?>
    </head>
<body>

	<canvas id="canvas"></canvas>

	<?php include 'header.php';?>
	<div class="container text-center" >
		<div class="col-md-offset-0 col-md-12">
		<div class="panel panel-default"   style="font-size:36px; background-color:rgba(255,255,255,.5)">
		<div class="panel-body">
			<div id="ques">
                YOU ARE AWESOME.<br/>
                YOU HAVE HIT THE TREASURE.<br/>
                <img src="images/th.png" style="max-height:300px"/><br/>
                Stay tuned to <a href="https://www.facebook.com/funatCulrav" target="_blank">Culrav Qtiyapa</a> for final results.
			</div>
		</div>
		</div>
		</div>
	</div>

</body>        
</html>

