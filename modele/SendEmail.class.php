<?php 

class SendEmail {

    public static function send($message, $toMail, $subject){

        $to = "hola@cvbien.co, m.elbarchaoui.caci@gmail.com, assiahamouma@yahoo.com, ameliagro@gmail.com";  
        $from = "sebastian@tallern.com";
        $Bcc = $toMail;
        $subject = $subject;
        $htmlContent = $message;        

        $headers = "From: $from\n";
        $headers .= "Bcc: $Bcc\n";  

        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=UFT-8\n";
        if( mail($to, $subject, $htmlContent, $headers) ){
            return true;
        } else {
            return false;
        }
        
    }
    
}

?>


