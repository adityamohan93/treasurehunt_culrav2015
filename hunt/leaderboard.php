<?php
include("db_connect.php");
	session_start();
	$uid=-1;
	if(isset($_SESSION['id']))
	{$uid=$_SESSION['id'];}	
?>
<html>
	<head>
		<title>Treasure Hunt</title>
        <?php include 'files.php'; ?>
	</head>
	<body>

		<?php include 'header.php';?>
		
        <table class="table table-hover">
        	<thead>
            	<tr>
                	<th>#</th>
                    <th>Username</th>
                    <th>College</th>
                    <th>Questions Solved</th>
                    <th>Credits</th>
                </tr>
            </thead>
            <tbody>
            	
                <?php
					$query="SELECT * FROM level ORDER BY `Last Answered` DESC, `Credits` DESC";
					$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
					$rank=1;
					while($user=mysqli_fetch_array($fetch))
					{
						$query2="SELECT * FROM logininfo WHERE UID=".$user['UID']." ";
						$fetch2=mysqli_query($conn,$query2)or die("ERROR: ".mysqli_error($conn));
						$userinfo=mysqli_fetch_array($fetch2);
						
                                                 if($user['UID']!=1)
                                                 {
							if($user['UID']==$uid)
							echo "<tr class=\"success\" >
								<td>".$rank."</td>
								<td>".$userinfo['Username']."</td>
								<td>".$userinfo['College']."</td>
								<td>".$user['Last Answered']."</td>
								<td>".$user['Credits']."</td>
							</tr>";			
							else
							echo "<tr>
								<td>".$rank."</td>
								<td>".$userinfo['Username']."</td>
								<td>".$userinfo['College']."</td>
								<td>".$user['Last Answered']."</td>
								<td>".$user['Credits']."</td>
							</tr>";			
							
						        $rank++;
                                                }
					}
				?>
            </tbody>
        </table>
        
      </body>
</html>