<html>

<head>
<title>xxx</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

	<link rel='icon' href='favicon.ico' />
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
<form method="post" action="">
   <p>
       <label for="pseudo">Username :<br /></label>
	   <input  class="form-control" type="pseudo" name="pseudo" id="pseudo" />
       <br />
       <label for="pass">Password :<br /></label>
       <input  class="form-control" type="password" name="pass" id="pass" />
<br /> 
       
	   
       <input type="submit" class = "btn btn-default" value="Connect" />
<?php
require "db.php";

session_start();
if(isset($_SESSION['id'])){
header('Location: account.php');
}

if(isset($_POST['pseudo'], $_POST['pass'])){

$pass_hache = sha1($_POST['pass']);
$req = $bdd->prepare('SELECT id FROM customers WHERE pseudo = :pseudo AND password = :pass');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => $pass_hache));

$resultat = $req->fetch();


if (!$resultat)
{
?>
   <p>Bad credentials</p>
   <?php
}

else
{
    $_SESSION['id'] = $resultat['id'];
	
    echo 'You have successfully logged in';
	header('Location: account.php');
	
	
}
}



?>
   </p>
   <a href="pass.php">Forgot my password</a>
   </center>
</form>
				</div>
</body>
</html>
