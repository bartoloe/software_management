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
			<a href = "account.php"><div class='header'>
				</div>
				</a>
			<?php
require "db.php";
session_start();

if(empty($_SESSION['id'])){
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
  <button type="submit" style="display: inline;" class="btn btn-default">Download latest version of xxx</button>
  </form>
  <form style="display: inline;" action="logout.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Log out</button>
  </form>
</div>

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
  <button type="submit" style="display: inline;" class="btn btn-default">Download latest version of xxx</button>
  </form>
  <form style="display: inline;" action="hwid.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Change HWID</button>
  </form>
  <form style="display: inline;" action="logout.php">
  <button type="submit" style="display: inline;" class="btn btn-default">Log out</button>
  </form>
</div>

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

<?php
}
}
?>

				


<?php
$req = $bdd->prepare('SELECT hashwid, hwidtime FROM customers WHERE id = :id');
$req->execute(array(
    'id' => $_SESSION['id']));
$resultat = $req->fetch();

if($resultat['hwidtime'] > 0){
echo '<br /><br /><h3>You have already changed your HWID during your subscription, sorry but you can\'t change it no more.</h3>';
}

if($resultat['hwidtime'] == 0){
?>
   <p><br /><br />
   <form style="display: inline;" action="hwid.exe">
  <button type="submit" style="display: inline;" class="btn btn-default">Get HWID</button>
  </form><br />
  <form method="post" action="">
       <label for="hwid">New HWID : <br /></label>
	   <input type="hwid" name="hwid" id="hwid" />
       
	   
       <input class="btn btn-default" type="submit" value="Change HWID" />
   </p>
   <br />
   <h4>Warning ! HWID can only be changed <span style = "color: orange">once</span> for each subscription</h4><br />
   <h3>You are not allowed to sell your license</h3>
</form><?php
if(isset($_POST['hwid'])){
$hwid = htmlspecialchars($_POST['hwid']);
$req = $bdd->prepare('UPDATE customers SET hashwid = :hwid, hwidtime = :hwidtime WHERE id = :id');
  $req->execute(array(
	  'hwid' => $hwid,
	  'hwidtime' => 1,
	  'id' => $_SESSION['id']));
	  echo '<br /><br /><h3>You have successfully changed your hwid to ' . $hwid . '</h3>';
}
?>
<?php
}


?>

      </center>    														 

</div>
																			 

</div>
</body>
</html>