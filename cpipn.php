<?php    

require "db.php";
    // Fill these in with the information from your CoinPayments.net account.
    $cp_merchant_id = 'bbd607da32d1c6803020ef1e400c2549';
    $cp_ipn_secret = 'tMi112AUpUpEcFfY09e9';
    $cp_debug_email = 'xxx@gmail.com';
    
    //These would normally be loaded from your database, the most common way is to pass the Order ID through the 'custom' POST field.
    $order_currency = 'USD';

    
    function errorAndDie($error_msg) {
        global $cp_debug_email;
        if (!empty($cp_debug_email)) {
            $report = 'Error: '.$error_msg."\n\n";
            $report .= "POST Data\n\n";
            foreach ($_POST as $k => $v) {
                $report .= "|$k| = |$v|\n";
            }
            mail($cp_debug_email, 'CoinPayments IPN Error', $report);
        }
        die('IPN Error: '.$error_msg);
    }
    
    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
        errorAndDie('IPN Mode is not HMAC');
    }
    
    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
        errorAndDie('No HMAC signature sent.');
    }
    
    $request = file_get_contents('php://input');
    if ($request === FALSE || empty($request)) {
        errorAndDie('Error reading POST data');
    }
    
    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) {
        errorAndDie('No or incorrect Merchant ID passed');
    }
        
    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
    if ($hmac != $_SERVER['HTTP_HMAC']) {
        errorAndDie('HMAC signature does not match');
    }
    
    // HMAC Signature verified at this point, load some variables.

    $txn_id = $_POST['txn_id'];
    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $amount1 = floatval($_POST['amount1']);
    $amount2 = floatval($_POST['amount2']);
    $currency1 = $_POST['currency1'];
    $currency2 = $_POST['currency2'];
	$email = $_POST['email'];
	if($_POST['item_name'] == 'xxx 6 months'){
	$grade = 'A';
	$order_total = 60.00;
	}else{
	$order_total = 35.00;
	$grade = 'B';
	}
    $status = intval($_POST['status']);
    $status_text = $_POST['status_text'];

    //depending on the API of your system, you may want to check and see if the transaction ID $txn_id has already been handled before at this point

    // Check the original currency to make sure the buyer didn't change it.
    if ($currency1 != $order_currency) {
        errorAndDie('Original currency mismatch!');
    }    
    
    // Check amount against order total
    if ($amount1 < $order_total) {
        errorAndDie('Amount is less than order total!');
    }
  
    if ($status >= 100 || $status == 2) {
        // payment is complete or queued for nightly payout, success

$codeverif = sha1(microtime(TRUE)*100000);//A-Bxxxxxxxx
$codeverif2 = substr_replace($codeverif, $grade, 0 , 1);

//New client
$req = $bdd->prepare('INSERT INTO application(hash) VALUES(:hash)');
  $req->execute(array(
	  'hash' => $codeverif2));
	  
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui présentent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = 'Hello,

	Thanks for buying xxx.
	
	Please click on this link to create an account :
	
	http://5.39.28.169/xxx/signup.php?hash='.urlencode($codeverif2);

	$message_html = '<html>
	<head>

	</head>
	<body>
	<b>xxx</b><br /> <br /><br />
	Thanks for buying xxx.<br />
	Please click on this link to create an account :<br />
	<a href="http://5.39.28.169/xxx/signup.php?hash='.urlencode($codeverif2).'">Create an account</a>
	</body>
	</html>';
	//==========
	 

	 
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Purchase of xxx";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"xxx\"<emmanuel8400@gmail.com>".$passage_ligne;
	$header.= "Reply-to: \"xxx\" <emmanuel8400@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	 
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	 
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	 
	//=====On ferme la boundary alternative.
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
	//==========
	 
	 
	 
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	 
	//========== 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	
}
else if ($status < 0) {
        //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent
   
   } else {
        //payment is pending, you can optionally add a note to the order page
		
    }
    die('IPN OK'); 