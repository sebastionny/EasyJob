<?php require_once('vues/include/headTest.php'); ?>

         <div class="container-fluid space100 ">

         <div class="row">
             <div class="col-md-3">
                 <div class="fixed">

                     <?php
                     if (!ISSET($_SESSION)) session_start();
                     if (ISSET($_SESSION["connected"])) {

                         ?>
                         <div class="profil">
                            <img src="<?=$_SESSION['infoEmploye']->getPhoto()?>" alt="<?=$_SESSION['infoCompte']->getPrenom()?>" class="img-fluid ">
                         </div>
                         <form action="?action=profilEmploye" method="post" enctype="multipart/form-data" class="space30 fontCenter">
                         <?php if (ISSET($_REQUEST["field_messages"]["upPhoto"]))
                            echo "<br/><span class=\"warningMessage font2\">".$_REQUEST["field_messages"]["upPhoto"]."</span>";
                        ?>   
                         <div class="form-group">
                                 <input type="file" class="form-control-file font2" name="photoProfilFile">
                             </div>
                             <button type="submit" class="btn btn-primary font2" name="uploadBtn" value="photoProfil">Changer</button>
                         </form>
                         

                     <?php
                            $activeService = $activeCommentaire = $active = '';
                            if (isset($_REQUEST['profil'])){
                                if ($_REQUEST['profil'] == 'mesService')
                                    $activeService = 'activeLine';
                                if ($_REQUEST['profil'] == 'commentaire')
                                    $activeCommentaire = 'activeLine';
                            }else{
                                $active = 'activeLine';
                                }
                    }else {  ?>
                         <h1> HOLAAAAAAA ERROR EN SESSION CONNECTED </h1>
                     <?php } ?>

                    <div class="space100 font2 fontGrand3 ">
                        <a href="?action=profilEmploye" class="btn btn-line1 btn-block color1 <?=$active?>"> MON PROFIL</a>
                        <a href="?action=profilEmploye&profil=mesService" class="btn btn-line1 btn-block color1 <?=$activeService?>"> MES SERVICES</a>
                        <a href="?action=profilEmploye&profil=commentaire" class="btn btn-line1 btn-block color1 <?=$activeCommentaire?>"> MES COMMENTAIRES</a>
                        <a href="?action=desactiver" class="btn btn-line1 btn-block color1"> DESACTIVER MON COMPTE</a>
                        <a href="?action=logout" class="btn btn-line1 btn-block color1"> ME DÉCONNECTER</a>
                    </div>
                 </div>
             </div>

             <section class="col-md-9 lineCote">
                 <?php
                 if (isset($_REQUEST['profil'])){
                     if ($_REQUEST['profil'] == 'mesService')
                         require_once('vues/include/employe/staffDemandeService.php');
                     if ($_REQUEST['profil'] == 'commentaire')
                         require_once('vues/include/employe/commentaire.php');
                 }else
                     require_once('vues/include/employe/profil.php');
                ?>
             </section>

         </div>
         </div>
</div>
         

<?php     require_once('vues/include/footer.php'); ?>
