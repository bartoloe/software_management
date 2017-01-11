<?php
try
{
	global $bdd;
	$bdd = new PDO('mysql:host=localhost;dbname=crypter', 'root', '');
	//$bdd = new PDO('mysql:host=localhost;dbname=crypter', 'manu', 'ai6jsvgk');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function random_str($nbr) {
    $str = "";
    $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ0123456789";
    $nb_chars = strlen($chaine);

    for($i=0; $i<$nbr; $i++)
    {
        $str .= $chaine[ rand(0, ($nb_chars-1)) ];
    }

    return $str;
}

?>