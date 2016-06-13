<?php
include("db_connect.php");
	session_start();
	if(!isset($_SESSION['id']))
		{header('Location: ./index.php');die();}
			
	$uid=htmlentities(mysqli_real_escape_string($conn,$_SESSION['id']));
	$ans=htmlentities(mysqli_real_escape_string($conn,$_POST['ans']));
	
	//truncate ans get in required format
	
	$query="SELECT * FROM level WHERE UID=\"$uid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	$qid=$result['Last Answered']+1;
	$credits=$result['Credits'];
	
	$query="SELECT * FROM questions WHERE QID=\"$qid\"";
	$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	$result=mysqli_fetch_array($fetch);
	$answer=$result['Answer'];
	$solvers=$result['Solvers'];
	
	if($ans==$answer)
	{
		$query="UPDATE gameinfo SET `T".$qid."`=NOW() WHERE UID=\"$uid\" ";
		$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
		
		if($solvers==0)
		$gain=10;
		else if($solvers<20)
		$gain=9;
		else if($solvers<50)
		$gain=8;
		else if($solvers<100)
		$gain=7;
		else
		$gain=5;
		
		$credits+=$gain;
		$query="UPDATE level SET `Last Answered`=\"$qid\",`Credits`=\"$credits\" WHERE UID=\"$uid\" ";
		$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
		
		$query="UPDATE creditinfo SET `C".$qid."`=\"$gain\" WHERE UID=\"$uid\" ";
		$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
		
if($uid!=1)
	{	$query="UPDATE questions SET `Solvers`=\"$solvers\"+1 WHERE QID=\"$qid\" ";
		$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
	}	
		$new=$qid+1;
		{header("Location: ./play.php?qid=".$new." ");die();}	
	}
	else
		{header("Location: ./play.php?qid=".$qid." ");die();}
		
?>