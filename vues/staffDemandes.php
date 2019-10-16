<?php require_once('vues/include/headTest.php'); ?>

<div class="container-fluid space100 ">

    <div class="row">
        <div class="col-md-3">
            <img src="img/pp.jpg" alt="Profil de ..." class="img-thumbnail profil ">

            <form class="space30 fontCenter">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary ">MODIFIER </button>
            </form>

            <div class="space100 font2 fontGrand3 ">
                <a href="#" class="btn btn-line1 btn-block color1 ">MON PROFIL</a>
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> MES SERVICES</a>
                <a href="#" class="btn btn-line1 btn-block color1 ">MES COMMENTAIRES</a>
                <a href="#" class="btn btn-line1 btn-block color1"> ME DÉCONNECTER</a>
            </div>
        </div>

        <section class="col-md-9 lineCote">
            <div class="container">
                <?php require_once('vues/include/employe/staffDemandeService.php');?>
            </div>
        </section>

    </div>
</div>
</div>


<?php     require_once('vues/include/footer.php'); ?>
