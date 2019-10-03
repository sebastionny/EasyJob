<?php
$nom="Assia";
$dateS="12-06-2019";
$prenom="Hamouma";
$proffetion="Serveur/euse";
$ville="Montreal";
$commentaire="Service tres aimable et mon bol était exquis. J'ai pris celui au tempeh, rassasiant"
    . "The restaurent had a homey ambience and the prix fixe menu was an experience your taste buds will never forget."
    . " Not to slight a sommelier's dream of a wine list. et goûteux!";
$nbreEtoile=3;
$ZIP="H1Z2U1";
$HeureDe=18;
$Heure=8;
$salaire=12;

require_once('vues/include/headTest.php'); ?>

<div class="container-fluid space100 ">

    <div class="row">
        <div class="col-md-3">
            <img src="img/pp.jpg" alt="Profil de ..." class="img-thumbnail profil ">

            <form class="space30 fontCenter">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary ">Changer </button>
            </form>

            <div class="space100 font2 fontGrand3 ">
                <a href="#" class="btn btn-line1 btn-block color1 "> Mon Profil</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes services</a>
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>


            </div>
        </div>

        <section class="col-md-9 lineCote">
            <?php     require_once('vues/include/employe/commentaire.php'); ?>
        </section>
    </div>
</div>
</div>
<?php     require_once('vues/include/footer.php'); ?>
