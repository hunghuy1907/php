<!DOCTYPE html>
<html>
	<head>
		<title>Voting System in php</title>
	<link rel="stylesheet" href="style.css"/>
	</head>
<body>
<div style="background: black; color: white; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;"><h2>Vote for your favorite player.</h2></div>
<div class="container">
<form action="index.php" method="post" align="center">
	<img src="images/messi.jpg" width="280" height="250"/>
	<img src="images/drogba.jpg" width="280" height="250"/>
	<img src="images/Ronaldo.jpg" width="280" height="250"/>
	
<input type="submit" name="messi" value="Vote for Messi"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="drogba" value="Vote for Drogba"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="Ronaldo" value="Vote for Ronaldo"/>
</form>
<?php

$con = mysqli_connect("localhost","root","","mytest");

if(isset($_POST['messi']))
{
	$vote_messi = "update votes set messi=messi+1";
	$run_messi = mysqli_query($con,$vote_messi);
	
	if($run_messi){
		echo "<h2 align='center'> Your vote has been cast for lionel messi!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}


if(isset($_POST['drogba']))
{
	$vote_drogba = "update votes set drogba=drogba+1";
	$run_drogba = mysqli_query($con,$vote_drogba);
	
	if($run_drogba){
		echo "<h2 align='center'> Your vote has been cast for dider drogba!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}


if(isset($_POST['Ronaldo']))
{
	$vote_Ronaldo = "update votes set Ronaldo=Ronaldo+1";
	$run_Ronaldo = mysqli_query($con,$vote_Ronaldo);
	
	if($run_Ronaldo){
		echo "<h2 align='center'> Your vote has been cast for cristiano ronaldo!</h2>";
		echo "<h2 align='center'><a href='index.php?results'>View Results</a></h2>";
	}
}
//New Section Started 
if(isset($_GET['results']))
{
	$get_votes = "select * from votes";
	$run_votes = mysqli_query($con, $get_votes);
	$row_votes = mysqli_fetch_array($run_votes);
	
			$messi = $row_votes['messi'];
			$drogba = $row_votes['drogba'];
			$Ronaldo = $row_votes['Ronaldo'];
			
	$count = $messi+$drogba+$Ronaldo;
	
	
	$per_messi = round($messi*100/$count) . "%";
	$per_drogba = round($drogba*100/$count) . "%";
	$per_Ronaldo = round($Ronaldo*100/$count) . "%";
	
	echo "
	<div style='background: orange' padding: 10px; text-align: center;>
		<center>
			<h2>Updated Result:</h2>
		<p style='background: black; color: white; padding: 10px; width:500px;'>
			<b>Lionel Messi: </b> $messi ($per_messi)
		</p>
		
		<p style='background: black; color: white; padding: 10px; width:500px;'>
			<b>Didier Drogba: </b> $drogba ($per_drogba)
		</p>
		
		<p style='background: black; color: white; padding: 10px; width:500px;'>
			<b>Cristiano Ronaldo: </b> $Ronaldo ($per_Ronaldo)
		</p>
		</center>
	</div>
	";
}
?>
</div>



<div style="background: black; color: white; text-align: center; width: 100%; padding: 7px; font-family: comic sans ms;"><h2>Created by abdull waheed from: www.waheedacademy.com</h2></div>
</body>
</html>