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
?>
<br /><br /><form method="post" name="submit" action="" enctype="multipart/form-data">
		  <input type='hidden' name='upload_file' value='upload_file' />
          <input type="file" class="btn btn-default" name="uploadedfile"><br />
          <input type="submit" name="submit" class="btn btn-default">
        </form>
		<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
																								
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



		
		//include("design/header.php");
        include('parse.php');
		
		
		
        if(isset($_POST['upload_file'])){
        if ($_POST['upload_file'] == 'upload_file')
        {
        $id="2771";
        $token="d27294281a5d1f89fbd1";
        $url='http://xxx.net/remote.php'; 
        $type='file';
        $options=getopt('t:d:e:l');
        $type!='domain';
        $type!='url';
        $type!='exploit';   
        $link=1;
        $format='txt'; 
        $disable='';
        $enable='';
        $myurl="http://".$_SERVER['HTTP_HOST'].
        $target_path = "uploads/";
		$random = sha1(microtime(TRUE)*100000);
		

        $target_path = $target_path . basename( $random . '.exe');
        
        if(!move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                die("There was an error uploading the file, please try again!");
        }

        $file=$target_path;

        if (($type!='file' && $type!='domain' && $type!='url' && $type!='exploit') || $file=='')
        {
                die("File parameter invalid");
        }
        
        if (($type == 'file') && (!file_exists($file))) die ("$file doesn't exist.\n");
        
        $local_directory=dirname(__FILE__);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        $post = array(
                'token'=>$token,
                'id'=>$id,
                'action'=>$type,
                'uppload'=>'@'.$local_directory.'/'.$file,
                'frmt'=>'json'
        );
        
      //  var_dump($post);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $response = curl_exec($ch);
               
                $my_json = json_decode2($response);
                $my_json_keys = array_keys($my_json);
                
                $result = '';
                $final_result = 0;
                for ($i=0; $i<count($my_json_keys); $i++)
                {
                                $detection = $my_json[$my_json_keys[$i]];
                                
                                if ($detection == 'OK')
                                {
                                                $detection = '<span style="color: green">Clean</span>';
												
                                }
                                else
                                {
                                                $detection = '<span style="color: red">' . $detection . '</span>';
												$final_result++; 
												
                                }
                                $result .= '<tr><td width="45%">' . $my_json_keys[$i] . '</td><td>' . $detection . '</td></tr>';
							}
							if ($final_result !==0)


			
			{
			$shit = "Result:  ( <font color='red'> ".$final_result."/37</font> )";
			
			} else  { $shit = "Result:   ( <font color='green'> ".$final_result."/37</font> )"; }
			

		$opStr = '';
	    $opStr.= "<br><br>";
		
         $opStr.="<center><b>".$shit."</b></center><br>"; 
         $opStr.="<table align='center' width='700'><tbody>".$result."</tbody></table></form></body>";
         $opStr.="<br><br>";
         $opStr.="<center><body><br><br>Filename: <b>". basename( $_FILES['uploadedfile']['name']).PHP_EOL."</b><br><br>";
		 $opStr.="<center>File MD5 Hash: <b>". md5_file($file)."</b><br><br>";
		 $opStr.="<center>File SHA1: <b>".sha1($file)."</b><br><br>";
		 $opStr.="<center>File Size: <b>".filesize($file)." Bytes</b><br><br>";
		$opStr.="<center>Time Scanned: ".date('<b> j-m-y,   h:i:s </b><br><br>');
		$opStr.="</div>";
		echo $opStr;
	
	
		
		} 
	
			
}
?>
</center>
				</div>
</body>
</html>