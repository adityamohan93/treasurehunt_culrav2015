<?php
include("db_connect.php");
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: ./index.php');die();
	}	
	$uid=mysqli_real_escape_string($conn,$_SESSION['id']);
	$qid=htmlentities(mysqli_real_escape_string($conn,$_GET['qid']));

	$query="SELECT * FROM level WHERE UID=\"$uid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	$y=$result['Last Answered']+1;
	
	if($qid!=$y)
		{header("Location: ./play.php?qid=".$y." ");die();}
	
	if($qid==51)
		{header("Location: ./final.php");die();}

	$query="SELECT * FROM questions WHERE QID=\"$qid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	
	$solvers=$result['Solvers'];
	$pics=$result['Photos'];
	$audio=$result['Audio'];
	$video=$result['Video'];
	
?>
<html>
<head>
    <title>Treasure Hunt</title>
    <?php include 'files.php'; ?>
</head>
<body>

	<?php include 'header.php';?>
	<div class="container text-center">
		<div class="col-md-offset-0 col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading">
			<div class="pull-left">Question No. <?php echo $qid; ?></div>
			<div class="text-right">Points you can fetch : <?php echo points($solvers); ?></div>
		</div>
		<div class="panel-body">
			<div id="ques">
				<?php
					
					for($i=1;$i<=$pics;$i++)
					{
						$a="h_$qid-$i";
						$a=md5($a);
						$a=$a.".jpg";
						echo "<img style=\"max-width:400px\" src=\"images/$a\" >";
						echo "&nbsp";
					}
					for($i=1;$i<=$audio;$i++)
					{
						$a="$qid-$i.mp3";
						echo "<audio controls autoplay>
							 <source src=\"audio/$a\" type=\"audio/mpeg\">
							 Your browser does not support the audio element.
							 </audio>";
        				echo "&nbsp";
					}
					/*for($i=1;$i<=$video;$i++)
					{
						$a="$qid-$i.mp4";
						
						echo "<embed src=\"video/$a\" width=\"800 px\" >
   						     <noembed><img src=\"images/1-1\" alt=\"Alternative Media\" ></noembed>";
         				echo "&nbsp";
					}*/
					for($i=1;$i<=$video;$i++)
					{
						$a="$qid-$i.mp4";
						echo "<video controls autoplay=\"autoplay\" width=\"800 px\">
							 <source src=\"video/$a\" type=\"video/mp4\" />
							 Your browser does not support the video element.
							 </video>";
        				echo "&nbsp";
					}
				?>
			</div>
		</div>
		<div class="panel-footer">
			<form method="post" action="checkanswer.php">
				<input id="ans" type="text" name="ans" class="form-control input-lg text-center" placeholder="Answer">
			</form>
		</div>
		</div>
		</div>
	</div>

</body>        
</html>

<?php
	function points($solvers)
	{
		if($solvers==0)
			return 10;
		else if($solvers<20)
			return 9;
		else if($solvers<50)
			return 8;
		else if($solvers<100)
			return 7;
		else
			return 5;
	}
?>