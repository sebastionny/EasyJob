<?php
require_once('controleur/Action.Interface.php');
require_once('modele/ServiceDAO.class.php');

class ConfirmationServiceAction implements Action{
    public function execute(){
        if (!ISSET($_SESSION)) session_start();
		  if (ISSET($_SESSION["connected"])){
            
            if( isset($_REQUEST['sendDemande']) ){

                $serviceDAO = new ServiceDAO();

                var_dump($_SESSION['Service']);
                // $n = $_POST['n']; // HINT: use preg_replace() to filter the data
                // $e = $_POST['e'];
            
                // $m = nl2br($_POST['m']);

                $to = "hola@cvbien.co";  
            
                $from = "sebastian@tallern.com";
                $Bcc = "sebastian@tallern.com";
                $subject = 'On a trouve un job pour toi !';
                
                //menssage en html
                
                $htmlContent = '
                <html> 
                        <body> 
                        <div style="background-image:url("https://tallern.com/clientes/easyjob/img/EMAIL.jpg");background-position:top center;background-repeat:no-repeat;background-color:#FFFFFF;">

                        <div style="color:#41133c;font-family:"Montserrat", "Trebuchet MS", "Lucida Sans", Tahoma, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                            <div style="font-size: 12px; line-height: 14px; font-family: "Montserrat", "Trebuchet MS", "Lucida Sans", Tahoma, sans-serif; color: #41133c;">
                            <p style="font-size: 14px; line-height: 45px; text-align: left; margin: 0;"><span style="font-size: 38px;">Hey Salut!,</span></p>
                            <p style="font-size: 14px; line-height: 45px; text-align: left; margin: 0;"><span style="font-size: 38px;">On a de belle nouvelle pour toi</span></p>
                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 24px; text-align: left; margin: 0;"><span style="font-size: 20px;">
                            Un resto cherche ton profil. <br>
                            Voici l\'information qui corresponde au service : 
                        </span></p>


                        <div class="block-grid mixed-two-up" style="Margin: 0 auto; min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">

                                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 232px; width: 233px;">
                            <div style="width:100% !important;">

                            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                            <div text-align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">

                            <div style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#EE3168;border-radius:15px;-webkit-border-radius:15px;-moz-border-radius:15px;width:auto; width:auto;;border-top:1px solid #EE3168;border-right:1px solid #EE3168;border-bottom:1px solid #EE3168;border-left:1px solid #EE3168;padding-top:5px;padding-bottom:5px;font-family:"Montserrat", "Trebuchet MS", Tahoma, , Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"><span style="padding-left:40px;padding-right:45px;font-size:20px;display:inline-block;">
                            <span style="font-size: 16px; line-height: 32px;"><span style="font-size: 20px; line-height: 40px;"><strong>Voir l\'offre</strong></span></span>
                            </span></div>

                            </div>

                            </div>

                            </div>
                            </div>

                            <div class="col num8" style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 464px; width: 466px;">
                            <div style="width:100% !important;">

                            <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                            <div style="color:#41133c;font-family:"Montserrat", "Trebuchet MS", Tahoma, sans-serif;line-height:150%;padding-top:10px;padding-right:10px;padding-bottom:20px;padding-left:10px;">
                            <div style="font-size: 12px; line-height: 18px; font-family: "Montserrat", "Trebuchet MS", Tahoma,  Tahoma, sans-serif; color: #41133c;">
                            <p style="font-size: 14px; line-height: 45px; margin: 0;"><span style="font-size: 30px;"><strong><span style="line-height: 45px; font-size: 30px;">Serveur/euse</span></strong></span></p>
                            <p style="font-size: 14px; line-height: 21px; margin: 0;"><span style="font-size: 14px; line-height: 21px;"><span style="line-height: 21px; font-size: 14px;">Date de service&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; J</span></span><span style="font-size: 14px; line-height: 21px;"><span style="line-height: 21px; font-size: 14px;">eudi 19 /09/2019.</span></span></p>
                            <p style="font-size: 12px; line-height: 27px; margin: 0;"><strong><span style="font-size: 15px; line-height: 22px;">Ville&nbsp;</span><span style="font-size: 15px; line-height: 22px;">Montréal&nbsp;</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span style="font-size: 18px;"> Heure <strong>Depart 18h</strong>.</span></p>
                            </div>
                            </div>

                            </div>

                            </div>
                            </div>

                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 24px; text-align: left; margin: 0;"><span style="font-size: 20px;">
                        Bonne nouvelle : ton profil est bien demandé !  <br>
                        Mettez votre disponibilité à jour et augmentez votre chance de trouver un job <a href="https://tallern.com/clientes/easyjob?action=profilResto">ICI</a> ICI
                        </span></p>
                        
                        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/signagure.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 350px; display: block;" title="Image" width="350">
                    

                    </body> 
                    </html>   

                ';        
            
                $headers = "From: $from\n";
                $headers .= "Cc: $Bcc\n";  

                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=UFT-8\n";
                if( mail($to, $subject, $htmlContent, $headers) ){
                    echo "success";
                    $serviceDAO->create($_SESSION['Service']['info']);          //Creation du service
                } else {
                    echo "The server failed to send the message. Please try again later.";
                }
                
            }


              
        return "confirmationService";
        }
        return "connection";
}



}
?>
