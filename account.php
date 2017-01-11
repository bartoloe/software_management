<html>

<head>
<title>xxx</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

	<link rel='shortcut icon' href='favicon.ico' />
	<link rel='stylesheet' href='css/screen.css' />
	<link rel='stylesheet' href='css/box_shadow.css' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


</script> 	

</head>
<body background='1.png'>

<div id='main-wrap' class='container_12'>

		<div class='grid_12'>
		<center>
			
		<br />
			<div class='shady-box'>
			<div class='header'>
				</div>
<?php
require "db.php";
session_start();
if(!isset($_SESSION['id'])){
header('Location: login.php');
}


$req = $bdd->prepare('SELECT pseudo, date_expiration FROM customers WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id']));
$resultat = $req->fetch();
$now = time(); 
$next = strtotime($resultat['date_expiration']) ;   
$datediff = $next- $now;
?>
<?php

if($_SESSION['id'] == 1){
?>
<div style = "display: inline;"class="btn-group" role="group" aria-label="...">
<form style="display: inline;" action="admin.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Administration</button>
  </form>
  <form style="display: inline;" action="scan.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Scanner</button>
  </form>
  <form style="display: inline;" action="download.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Download latest version of Luna Crypter</button>
  </form>
  <form style="display: inline;" action="logout.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Log out</button>
  </form>
</div>

<h3 style="margin-top:50px;">Hello <?php echo $resultat['pseudo'];?>,<br />

You have <span style = "color: orange;"><?php echo floor($datediff/(60*60*24)) - 1?></span> days left</h3>
<?php
}else
{
if($datediff>0){
?>
<div style = "display: inline;"class="btn-group" role="group" aria-label="...">
  <form style="display: inline;" action="scan.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Scanner</button>
  </form>
  <form style="display: inline;" action="renew.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Renew License</button>
  </form>
  <form style="display: inline;" action="download.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Download latest version of Luna Crypter</button>
  </form>
  <form style="display: inline;" action="hwid.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Change HWID</button>
  </form>
  <form style="display: inline;" action="logout.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Log out</button>
  </form>
</div>

<h3>Hello <?php echo $resultat['pseudo'];?>,<br /><br />

You have <span style = "color: orange;"><?php echo floor($datediff/(60*60*24)) - 1?></span> days left</h3>
<?php
}
else{
?><form style="display: inline;" action="scan.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Scanner</button>
  </form>
  <form style="display: inline;" action="renew.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Renew License</button>
  </form>
  <form style="display: inline;" action="logout.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Log out</button>
  </form>


<br /><br /><h3>Hello <?php echo $resultat['pseudo'];?>,<br /><br />
Your account has <span style = "color: orange;">expired</span></h3><br />



<?php
$req = $bdd->prepare('SELECT grade FROM customers WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id']));
	$result = $req->fetch();
	
	if($result[0] == 'Silver'){
	$req2 = $bdd->prepare('UPDATE customers SET grade = :grade WHERE id = :id');
  $req2->execute(array(
	  'grade' => 'expired ( 3 months license )',
	  'id' => $_SESSION['id']));
	}
	
	if($result[0] == 'Gold'){
	$req2 = $bdd->prepare('UPDATE customers SET grade = :grade WHERE id = :id');
  $req2->execute(array(
	  'grade' => 'expired ( 6 months license )',
	  'id' => $_SESSION['id']));
	}
}
}
?>
      </center>    														 

</div>
																			 

</div>
</body>
</html>
