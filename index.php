<?php

require("db.php");
session_start();
if(isset($_SESSION['id'])){
header('Location: account.php');
}
else{
header('Location: login.php');
}
?>
