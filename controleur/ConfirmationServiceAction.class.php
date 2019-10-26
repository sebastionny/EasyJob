<?php

class ConfirmationServiceAction implements Action{
    public function execute(){
        if (!ISSET($_SESSION)) session_start();
		  if (ISSET($_SESSION["connected"])){
            
            if( isset($_REQUEST['sendDemande']) ){

                $serviceDAO = new ServiceDAO();

                 // $m = nl2br($_POST['m']); m.elbarchaoui.caci@gmail.com, assiahamouma@yahoo.com, ameliagro@gmail.com

                $to = "hola@cvbien.co, m.elbarchaoui.caci@gmail.com, assiahamouma@yahoo.com, ameliagro@gmail.com";  
            
                $from = "sebastian@tallern.com";
                $Bcc = $_SESSION['Service']['courriels'];
                $subject = 'On a trouve un job pour toi !';
                
                //menssage en html
                
                $htmlContent = '
                <html> 
                        <body> 
                        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/EMAIL.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 700px; display: block;" title="Header" width="700">


                        <div style="color:#41133c;font-family:"Montserrat", "Trebuchet MS", "Lucida Sans", Tahoma, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                            <div style="font-size: 12px; line-height: 14px; font-family: "Montserrat", "Trebuchet MS", "Lucida Sans", Tahoma, sans-serif; color: #41133c;">
                            <p style="font-size: 14px; line-height: 45px; text-align: left; margin: 0;"><span style="font-size: 18px;">Hey Salut!,</span></p>
                            <p style="font-size: 14px; line-height: 45px; text-align: left; margin: 0;"><span style="font-size: 18px;">On a une belle nouvelle pour toi</span></p>
                            </div>
                        </div>

                        <div style=" margin-top: 25px; margin-bottom: 25px;" >
                            <p style="font-size: 12px; line-height: 24px; text-align: left; margin: 0;">
                                Un resto cherche ton profil. <br>
                                Voici l\'information qui corresponde au service : 
                            </p>
                        </div>
                        <div>
                            <a style="color: red" href="https://tallern.com/clientes/easyjob?action=profilEmploye&profil=mesService">
                                <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/btnOffre.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 350px; display: block;" title="Image" width="350">
                            </a>
                        </div>


                        <div style="font-size: 12px; line-height: 18px; font-family: "Montserrat", "Trebuchet MS", Tahoma,  Tahoma, sans-serif; color: #41133c;">
                            
                            <p><strong>
                                <span style="line-height: 45px; font-size: 30px;">'
                                .$_SESSION["Service"]["info"]->getTypeService() . '
                                </span>
                            </strong></p>
                            
                            <p style="font-size: 14px; line-height: 21px; margin: 0;">
                                <span style="font-size: 14px; line-height: 21px;">
                                    <span style="line-height: 21px; font-size: 14px;">
                                     Date de service '. $_SESSION["Service"]["info"]->getDate() . '
                                    </span>
                                </span>
                            </php>

                            <p style="font-size: 12px; line-height: 27px; margin: 0;">
                                <strong> <span style="font-size: 15px; line-height: 22px;">Remuneration: </span> </strong> 
                            
                                $ '. $_SESSION["Service"]["info"]->getRemuneration() . '
                            
                            </p>

                            <p style="font-size: 12px; line-height: 27px; margin: 0;">
                                <strong> <span style="font-size: 15px; line-height: 22px;">Heure Depart: </span> </strong> 
                                
                                '. $_SESSION["Service"]["info"]->getHeureDebut() . '
                            
                            </p>

                        </div>
 
                        <div style=" margin-top: 25px; margin-bottom: 25px;" >

                            <p style="font-size: 14px; line-height: 24px; text-align: left; margin: 0;">
                            Bonne nouvelle : ton profil est bien demandé !  <br>
                            Mettez votre disponibilité à jour et augmentez votre chance de trouver un job <a style="color: red" href="https://tallern.com/clientes/easyjob?action=profilEmploye&profil=mesService">ICI</a>
                            </p>
                        </div>
                       
                        <img align="center" alt="Image" border="0" class="center autowidth fullwidth" src="https://tallern.com/clientes/easyjob/img/signagure.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 350px; display: block;" title="Image" width="350">
                    

                    </body> 
                    </html>   

                ';        
            
                $headers = "From: $from\n";
                $headers .= "Bcc: $Bcc\n";  

                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=UFT-8\n";
                if( mail($to, $subject, $htmlContent, $headers) ){
                    //Creation du service
                    $serviceDAO->create($_SESSION['Service']['info']); 
                    return "restoConfirmationEnvoieEmploye";
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
