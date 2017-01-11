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
<br /><br /><a href ="add_users.php?grade=B">Add user for 3 months</a><br /><br />
  <a href ="add_users.php?grade=A">Add user for 6 months</a><br />
			
			<?php
			
			$req = $bdd->prepare('SELECT count(*) FROM customers WHERE grade = :grade');
$req->execute(array(
    'grade' => 'Silver'));
	$result = $req->fetch();
	$req = $bdd->prepare('SELECT count(*) FROM customers WHERE grade = :grade');
$req->execute(array(
    'grade' => 'Gold'));
	$result2 = $req->fetch();
	echo '</br ><b>Active 3 months licenses : ' . $result[0] . '</b><br /><br />';
	echo '<b>Active 6 months licenses : ' . $result2[0] . '</b><br /><br />';
	$result3 = $result[0] + $result2[0];
	echo '<h3>Total active licenses : ' . $result3 . '<br /><br /></h3>';
	
	
			
	
}
?>
				



   </center>    														 

</div>
																			 

</div>
</body>
</html>