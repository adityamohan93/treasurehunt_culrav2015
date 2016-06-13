<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if(!isset($_SESSION['id'])) { ?>
				<a class="navbar-brand" href="index.php">Treasure Hunt</a>
			<?php } else { ?>
				<a class="navbar-brand" href="play.php">Treasure Hunt</a>
			<?php } ?>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="#" data-toggle="modal" data-target="#Overview">Overview</a></li>
				<li><a href="#" data-toggle="modal" data-target="#Rules">Rules**</a></li>
				<li><a href="leaderboard.php">Leaderboard</a></li>
				<li><a href="#" data-toggle="modal" data-target="#Contact">Help</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if(!isset($_SESSION['id'])) { ?>
				<li><a href="pageforlogin.php">Login</a></li> 
				<li><a href="register_page.php">Register</a></li>     
			<?php } else { ?>
            	<li><a href="#" data-toggle="modal" data-target="#Credits">
                        <?php
							$query="SELECT * FROM logininfo WHERE UID=\"$uid\" ";
							$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
							$result=mysqli_fetch_array($fetch);
							echo $result['Username'];
//							include 'credits.php';
						?>
                    </a></li>
				<li><a href="logout.php">Logout</a></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</nav>


<!------------------credits modal------------>


<?php if(isset($_SESSION['id'])) { ?>

<div class="modal fade" id="Credits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="myModalLabel1">
         <?php 	echo $result['First Name']."&nbsp".$result['Last Name']."'s Credits :";	?>
		</h1>
      </div>
      <div class="modal-body">
  		<table class="table table-hover">
        	<thead>
            	<tr>
                	<th>Question</th>
                    <th>Credits</th>
                    <th>Time Submitted</th>
                </tr>
            </thead>
            <tbody>
            	
                <?php
					$query="SELECT * FROM level WHERE UID='$uid' ";
					$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
					$result=mysqli_fetch_array($fetch);
					$questions=$result['Last Answered'];
					
					$query="SELECT * FROM creditinfo WHERE UID='$uid'";
					$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
					$credits=mysqli_fetch_array($fetch);
					
					$query="SELECT * FROM gameinfo WHERE UID='$uid'";
					$fetch=mysqli_query($conn,$query)or die("ERROR: ".mysqli_error($conn));
					$time=mysqli_fetch_array($fetch);
					
					for($i=1;$i<=$questions;$i++)
					{
						echo "<tr>
								 <td>".$i."</th>
								 <td>".$credits['C'.$i]."</td>
								 <td>".$time['T'.$i]."</td>
							 </tr>";			
					}	
				?>
                
            </tbody>
       </table>
      	<h3>Total Credits : <?php echo $result['Credits']; ?> </h3>
       </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<!------overview modal----->
<div class="modal fade" id="Overview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="myModalLabel1">
         Overview
		</h1>
      </div>
      <div class="modal-body">
			<h3>Welcome to online Treasure Hunt 2015</h3>
            <h4>Unleash your wit and googling skills and try to hit the treasure before others..</h4>
       </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!------rules modal----->
<div class="modal fade" id="Rules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="myModalLabel1">
         Rules
		</h1>
      </div>
      <div class="modal-body">

		<ol>
            <li>Relate all the media given in the question and find a suitable answer.</li>
            <li>There will be only one answer. Only the answer in exact letters will be accepted.</li>
            <li>You will be redirected to next question only when your answer is correct, else the same queston will re-open</li>
            <li>The answer won't contain any space or numbers or any special characters or capital letters.
                <ul>
                    <li>Suppose the answer is -> <b>Treasure Hunt</b><br/>
                        This will be written as -> <i>treasurehunt</i>
                    </li>
                    <li><b>Convert the numbers to corresponding words.</b><br/>
                        Suppose your answer is -> <b>World Cup 2011</b><br/>
                        This will be written as -> <i>worldcuptwozerooneone</i>
                    </li>
                    <li>If there is any special character just drop it. Like -> <b>Beginner's Luck</b><br/>
                        This will be written as -> <i>beginnersluck</i>
                    </li>                          
                </ul>
           </li>
		</ol>
		<h2> SCORING </h2>
        <p>For every question, no. of points you can fetch for this will be displayed along side.</p>
        <ol>
        	<li>For every question, first to solve will get : <b>10 Points</b></li>
            <li>2nd to 20th : <b>9 Points</b></li>
            <li>21st to 50th : <b>8 Points</b></li>
			<li>51st to 100th : <b>7 Points</b></li>
            <li>100+ : <b>5 Points</b></li>
        </ol>   

	<h2> DETERMINING THE WINNER </h2>
        <ol>
            <li>The first one to finish the Hunt will get : <b>150 Points</b></li>
            <li>2nd : <b>100 Points</b></li>
            <li>3rd : <b>50 Points</b></li>
        </ol>
   <p> Whoever has the highest credits in the end will be declared the winner. </p>
 
       </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!------contact modal----->
<div class="modal fade" id="Contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h1 class="modal-title" id="myModalLabel1">
         Help
		</h1>
      </div>
      <div class="modal-body">
	<h4>For any assistance, drop a mail with subject "Treasure Hunt" at :</h4>
          <h3><a href="mailto:mnnit.workspace@gmail.com">mnnit.workspace@gmail.com</a></h3><br/>
        <h4>For hints refer :</h4>
          <h3><a href="https://www.facebook.com/funatCulrav" target="_blank">Culrav Qtiyapa</a></h3> 
          <h4>Everyone like this page and check the <b>Get Notifications</b> so that you don't miss any hint.</h4>  
       </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
