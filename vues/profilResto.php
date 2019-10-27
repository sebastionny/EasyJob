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
                        <img src="<?=$_SESSION['infoEmployeur']->getPhoto()?>" alt="<?=$_SESSION['infoCompte']->getPrenom()?>" class="img-fluid ">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" class="space30 fontCenter">
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="photoProfilFile">
                        </div>
                        <button type="submit" class="btn btn-primary " name="uploadBtn" value="photoProfil">MODIFIER </button>
                    </form>
                <?php
                    }else
                        {
                        ?>
                    <img src="<?=$_SESSION['infoEmployeur']->getPhoto()?>" alt="<?=$_SESSION['infoCompte']->getPrenom()?>" class="img-thumbnail profil ">
                <?php
                        }
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
                    <a href="?action=profilResto" class="btn btn-line1 btn-block color1 <?=$active?>"> MON PROFIL</a>
                    <a href="?action=profilResto&profil=mesService" class="btn btn-line1 btn-block color1 <?=$activeService?>">CHOISIR MES EMPLOYÉS</a>
                    <a href="?action=profilResto&profil=commentaire" class="btn btn-line1 btn-block color1 <?=$activeCommentaire?>"> MES COMMENTAIRES</a>
                    <a href="?action=logout" class="btn btn-line1 btn-block color1"> DESACTIVER MON COMPTE</a>
                    <a href="?action=desactiver" class="btn btn-line1 btn-block color1"> ME DÉCONNECTER</a>
                </div>
            </div>
        </div>
        <section class="col-md-9 lineCote">
            <div class="container">
                <?php
                if (!ISSET($_SESSION)) session_start();
                if (isset($_REQUEST['profil'])){
                    if ($_REQUEST['profil'] == 'mesService')
                        require_once('restoChoisir.php');
                   if ($_REQUEST['profil'] == 'commentaire')
                       require_once('vues/restoEvaluation.php');
                    if ($_REQUEST['profil'] == 'demande')
                        require_once('service.php');
                }else
                   require_once('vues/include/resto/profil.php');
                ?>
            </div>
        </section>

    </div>
</div>

<?php     require_once('vues/include/footer.php'); ?>
