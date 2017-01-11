<?php
        /*
        {"AVG Free":"OK","ArcaVir":"OK","Avast 5":"OK","Avast":"OK","AntiVir (Avira)":"OK","BitDefender":"OK","VirusBuster Internet Security":"OK","Clam Antivirus":"OK","COMODO Internet Security":"OK","Dr.Web":"OK","eTrust-Vet":"OK","F-PROT Antivirus":"OK","F-Secure Internet Security":"OK","G Data":"OK","IKARUS Security":"OK","Kaspersky Antivirus":"OK","McAfee":"OK","MS Security Essentials":"OK","ESET NOD32":"OK","Norman":"OK","Norton Antivirus":"OK","Panda Security":"OK","A-Squared":"OK","Quick Heal Antivirus":"OK","Rising Antivirus":"OK","Solo Antivirus":"OK","Sophos":"OK","Trend Micro Internet Security":"OK","VBA32 Antivirus":"OK","Vexira Antivirus":"OK","Webroot Internet Security":"EICAR-AV-Test","Zoner AntiVirus":"OK","AhnLab V3 Internet Security":"OK","BullGuard":"OK"}
        */
        
        function json_decode2($json)
        {
         $comment = false;
         $out = '$x=';

         for ($i=0; $i<strlen($json); $i++)
         {
                if (!$comment)
                {
                 if (($json[$i] == '{') || ($json[$i] == '['))       $out .= ' array(';
                 else if (($json[$i] == '}') || ($json[$i] == ']'))   $out .= ')';
                 else if ($json[$i] == ':')    $out .= '=>';
                 else                         $out .= $json[$i];          
                }
                else $out .= $json[$i];
                if ($json[$i] == '"' && $json[($i-1)]!="\\") $comment = !$comment;
         }
                eval($out . ';');
                return $x;
        }
		
?>
