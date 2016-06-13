<?php
session_start();
include("db_connect.php");

$uname=trim(htmlentities(mysqli_real_escape_string($conn,$_POST["uname"])));
if($uname==NULL)
{echo "Not valid Username..go back..";exit();}

$pass=htmlentities(mysqli_real_escape_string($conn,$_POST['pass']));
$pass=md5($pass);

$query="SELECT * FROM logininfo WHERE Username=\"$uname\" ";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
$result=mysqli_fetch_array($fetch);
	if($result['Password']==$pass){
		$_SESSION['id']=$result['UID'];
		
		$uid=$_SESSION['id'];
		$query="SELECT * FROM level WHERE UID=\"$uid\" ";
		$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));		
		$result=mysqli_fetch_array($fetch);
	
		$y=$result['Last Answered']+1;
		
		header("Location: ./play.php?qid=".$y." ");
		
	}
	else
	header('Location: ./index.php');
?>