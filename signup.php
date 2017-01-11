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

if(isset($_SESSION['id'])){
header('Location: account.php');
}


$reqhash = $bdd->query('SELECT hash FROM application');
while($resultat = $reqhash->fetch()){

if (!$resultat)
{
?>
   <p>Mauvais identifiant ou mot de passe !</p>
   <?php
}

else
if(!isset($_GET["hash"])){
header('Location: login.php');
}

$_GET['hash'] = htmlspecialchars($_GET['hash']);
if($_GET['hash'] == $resultat['hash']){
//header('Location: login.php');
?>
<form method="post" action="">
   <p>
       <label class="footcopy" for="email">Username :<br /></label>
	   <input type="user" name="email" id="email" />
       <br />
       <label class="footcopy" for="pass">Password : (5 char minimum )<br /></label>
       <input type="password" name="pass" id="pass" />
	    <br />
       <label class="footcopy" for="pass2">Password verification :<br /></label>
       <input type="password" name="pass2" id="pass2" />
	   <br />
	   <label for="hwid"><a href="hwidgenerator.exe">Hardware id</a><br /></label>
       <input type="hwid" name="hwid" id="hwid" />
	   <br />
	   <label for="hfprofile">Link to xxx user id<br /></label>
       <input type="hfprofile" name="hfprofile" id="hfprofile" />
	   <br />
	   
       <input class="css_button" type="submit" value="Sign up" />
   </p>
</form>
<?php
//Verif mail
$validmail = 1;
	if (isset($_POST['email'])){
		$_POST['email'] = htmlspecialchars($_POST['email']);
			if(empty($_POST['email']))
			{
				echo 'Please enter a username <br />';
				$validmail = 0;
			}
        $reponse = $bdd->prepare('SELECT id FROM customers WHERE pseudo = :email');
		$reponse->execute(array('email' => $_POST['email']));
		if ($reponse->fetchColumn()) 
		{
		?>
    <p>Sorry, this username has already been chosen</p>
	<?php
	$validmail = 0;

		}
    else
    {
	
		$validmail = 1;
    }

}

//Verif pass
	$validpass = 1;
		if (isset($_POST['pass'], $_POST['pass2']))
	{
		$_POST['pass'] = htmlspecialchars($_POST['pass']);
			if(empty($_POST['pass']))
		{
?>
<p>Please you must enter a password</p>
<?php
	$validpass = 0;
		}
	
	if($_POST['pass'] != $_POST['pass2'])
	{
?>
<p>The two passwords were different. Please try again</p>
<?php
	$validpass = 0;
	}
	if(strlen($_POST['pass'])<5)
	{
?>
<p>Your password is too short ( 5 char minimum )</p>
<?php
	$validpass = 0;
	}
	$pass_hache = sha1($_POST['pass']);
	}
	

	if(isset($_POST['email'], $_POST['pass'], $_POST['hwid'], $_POST['hfprofile']))
	{
		if($validpass == 1 && $validmail == 1)
		{
		$time = time();
		$now = date("Y-m-d", $time);
		$time3months = $time + (92 * 24 * 60 * 60);
		$time6months = $time + (184 * 24 * 60 * 60);
		$date3months = date("Y-m-d", $time3months);
		$date6months = date("Y-m-d", $time6months);
		$resultat = substr($_GET["hash"], 0, 1);
		if($resultat == 'A'){
		$datexpiration = $date6months;
		$grade = 'Silver';
		}
		else{
		$datexpiration = $date3months;
		$grade = 'Gold';
		}
		
	$req = $bdd->prepare('INSERT INTO customers(pseudo, password, date_creation, date_expiration, hashwid, profilehf, grade) VALUES(:pseudo, :password, :date_creation, :date_expiration, :hashwid, :hfprofile, :grade)');
	$req->execute(array(
	  'pseudo' => $_POST['email'],
	  'password' => $pass_hache,
	  'date_creation' => $now,
	  'date_expiration' => $datexpiration,
	  'hashwid' => $_POST['hwid'],
	  'hfprofile' => $_POST['hfprofile'],
	  'grade' => $grade
	 ));
	$_SESSION['id'] = $bdd->lastInsertId();
	$req2 = $bdd->prepare('DELETE FROM application WHERE hash = :hash');
$req2->execute(array(
	'hash' => $_GET['hash']));
?>
<p class="footcopy">You have been registered successfully <a href="login.php">Click here to continue<a/></p>
<?php
}
}

}


}


?>

      </center>    														 

</div>
																			 

</div>
</body>
</html>