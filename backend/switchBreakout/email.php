<?php

switch ($dataAction) {
        
    case 'emailreceipt':
        
        
        $x = 3;
        
        while ($x < ){
            
        }
         
        $recipient="t4.emil.henriksson@umea.nti.se";
        $subject="kvitto";
        $mail_body="mail test";

        $headers = "From: boxshopreceipt@gmail.com" . "\r\n" .
        "CC: boxshopreceipt@gmail.com";

    mail($recipient, $subject, $mail_body,$headers);


}

?>