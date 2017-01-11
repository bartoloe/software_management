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
$_SESSION = array();
session_destroy();
echo '<h3>Succesfully logged out</h3><br /><br />';
header('Location : login.php');
?>
    </center>    														 

</div>
																			 

</div>
</body>
</html>