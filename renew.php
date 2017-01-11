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
		
			
		<br />
			<div class='shady-box'>
				<center>
				<a href = "account.php"><div class='header'>
				</div>
				</a>
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


		$codeverif = sha1(microtime(TRUE)*100000);
		?>
		<br /><br /><br />First please connect on <a href ="http://xxx.net">Hackforums</a> with your account,<br />
		then click on this link : <a target="_blank" href="http://www.xxx.net/private.php?action=send&uid=222958&subject=xxx%xxx%20renew&message=Hello,%20I%20would%20like%20to%20renew%20my%20license%20for%20:%0A%0ABitcoin%20address%20:%0A%0AHash%20:%0A%0AThanks.">Renew license</a>
		<br />Don't forget to copy this hash code to the message : <?=$codeverif;?><br />
		You'll be receiving shortly the payment details.
		<br />
		<h3>Once done, do not open this page again.</h3>
		<?php
		$req = $bdd->prepare('UPDATE customers SET hashrenew = :hash WHERE id = :id');
  $req->execute(array(
	  'hash' => $codeverif,
	  'id' => $_SESSION['id']));
	 
		?>
		</center>
				</div>
</body>
</html>
