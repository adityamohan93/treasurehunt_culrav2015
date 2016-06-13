<?php
include("db_connect.php");

$fname=htmlentities(mysqli_real_escape_string($conn,$_POST["fname"]));
$lname=htmlentities(mysqli_real_escape_string($conn,$_POST["lname"]));
$clg=htmlentities(mysqli_real_escape_string($conn,$_POST["clg"]));
$regn=htmlentities(mysqli_real_escape_string($conn,$_POST["regn"]));
$uname=trim(htmlentities(mysqli_real_escape_string($conn,$_POST["uname"])));
if($uname==NULL)
{echo "Not valid Username..go back..";exit();}

$email=htmlentities(mysqli_real_escape_string($conn,$_POST["email"]));
$pass=htmlentities(mysqli_real_escape_string($conn,$_POST["pass"]));
$pass=md5($pass);

$query="INSERT INTO `logininfo`(`First Name`, `Last Name`, `College`, `Reg. No.`, `Email`, `Username`, `Password`) VALUES ('$fname','$lname','$clg','$regn','$email','$uname','$pass')";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));

$query="SELECT * FROM logininfo WHERE Username=\"$uname\" ";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));		
$result=mysqli_fetch_array($fetch);

$query="INSERT INTO `level` VALUES (".$result['UID'].",0,0)";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));		

$query="INSERT INTO `gameinfo`(`UID`) VALUES (".$result['UID'].")";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));		

$query="INSERT INTO `creditinfo`(`UID`) VALUES (".$result['UID'].")";
$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));		

	header('Location: ./registered.php');


?>