<?php

class receipt {
    
    
    
     public function sendReceipt(){  
         
         $email = "t4.emil.henriksson@umea.nti.se";
         $firstLastName = "John Doe";
         
         $to = $email;
         $subject = "Tack för ditt köp ". $firstLastName;
         
         $x = 1;
         $productammount = 5;
         
         $product1 = "låda";
         $ammount ="4";
         while($x <= 5) {
             echo $x;
             $x++;
         }
        echo "\r\n";
         $message = "temporary";

         // Always set content-type when sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

         // More headers
         $headers .= 'From: <boxshopreceipt@gmail.com>' . "\r\n";
         $headers .= 'Cc: boxshop@donotreply.com' . "\r\n";

       //  mail($to,$subject,$message,$headers);
         
         echo "funktion sendReceipt hämtad";
     }
}






/*
 $recipient="t4.emil.henriksson@umea.nti.se";
 $subject="kvitto";
 $mail_body="mail test";

$headers = "From: boxshopreceipt@gmail.com" . "\r\n" .
"CC: boxshopreceipt@gmail.com";

 mail($recipient, $subject, $mail_body,$headers);
*/ 

?>