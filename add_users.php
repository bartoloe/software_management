<?php
require "db.php";
session_start();

if($_SESSION['id'] == 1){
if(isset($_GET['grade'])){
$_GET['grade'] = htmlspecialchars($_GET['grade']);
$codeverif = sha1(microtime(TRUE)*100000);//A-Bxxxxxxxx
$codeverif2 = substr_replace($codeverif, $_GET['grade'], 0 , 1);

//New client
$req = $bdd->prepare('INSERT INTO application(hash) VALUES(:hash)');
  $req->execute(array(
	  'hash' => $codeverif2));
	//   echo '<a href="http://localhost/xxx/signup.php?hash=' . $codeverif2 . '">Copiez l\'adresse du lien </a>';
	echo '<a href="http://5.39.28.169/xxx/signup.php?hash=' . $codeverif2 . '">Copiez l\'adresse du lien </a>';

}
}

 ?>