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
                         <form action="" method="post" enctype="multipart/form-data" class="space30 fontCenter">
                             <div class="form-group">
                                 <input type="file" class="form-control-file" name="photoProfilFile">
                             </div>
                             <button type="submit" class="btn btn-primary " name="uploadBtn" value="photoProfil">Changer </button>
                         </form>

                     <?php }else {  ?>
                         <img src="<?=$_SESSION['infoEmploye']->getPhoto()?>" alt="<?=$_SESSION['infoCompte']->getPrenom()?>" class="img-thumbnail profil ">

                     <?php }
                     $activeService = $activeCommentaire = $active = '';
                     if (isset($_REQUEST['profil'])){
                         if ($_REQUEST['profil'] == 'mesService')
                             $activeService = 'activeLine';
                         if ($_REQUEST['profil'] == 'commentaire')
                             $activeCommentaire = 'activeLine';
                     }else
                         $active = 'activeLine';
                     ?>

                    <div class="space100 font2 fontGrand3 ">
                        <a href="?action=profilEmploye" class="btn btn-line1 btn-block color1 <?=$active?>"> Mon Profil</a>
                        <a href="?action=profilEmploye&profil=mesService" class="btn btn-line1 btn-block color1 <?=$activeService?>"> Mes services</a>
                        <a href="?action=profilEmploye&profil=commentaire" class="btn btn-line1 btn-block color1 <?=$activeCommentaire?>"> Mes commentaires</a>
                        <a href="?action=logout" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>
                    </div>
                 </div>
             </div>

             <section class="col-md-9 lineCote">
                 <div class="container">

                 <?php
                 if (!ISSET($_SESSION)) session_start();

                 if (isset($_REQUEST['profil'])){
                     if ($_REQUEST['profil'] == 'mesService')
                         require_once('vues/include/employe/staffDemandeService.php');
                     if ($_REQUEST['profil'] == 'commentaire')
                         require_once('vues/include/employe/commentaire.php');
                 }else
                     require_once('vues/include/employe/profil.php');

                ?>

                </div>
             </section>

         </div>
         </div>
</div>
         

<?php     require_once('vues/include/footer.php'); ?>
