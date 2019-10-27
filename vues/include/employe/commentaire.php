<div class="container">
    <div class="col space30 pb-3">
        <h3 class="font1 fontGrand1 color2">MES COMMENTAIRES</h3>
        <div class="font1 fontGrand4 space30">
            <?php
            require_once('./modele/classes/Liste.class.php');
            $employe =(int)$_SESSION["infoEmploye"]->getIdEmploye();
            $dao = new AccepteDAO();
            $liste= $dao->findAlltAccept ($employe);
            $mesCommentaires = Array();

            foreach($liste as $monEmp) {

            if ($monEmp->getIdEmploye()) {
                array_push($mesCommentaires, $monEmp);
                $idS = $monEmp->getIdService();
                foreach ($mesCommentaires as $monEmp) {
                    $nbreEtoile = $monEmp->getEtoile();
                    $commentaire = $monEmp->getCommentaire();

                }
            }
            $daoS = new ServiceDAO();
            $listeS = $daoS->findById($idS);
            $mesServices = Array ();

            foreach ($listeS as $monServ) {
                if ($monServ->getIdService()) {
                    array_push($mesServices, $monServ);
                }
            }




            foreach ($mesServices as $monServ){
            $HeureDe = "";
            $Heure = $monServ->getHeureFin();
            $dateS = $monServ->getDate();


            ?>


            <br/>
        </div>


        <div class="row resto space30">

            <div class="col-md-12 ">
                <div class="item color1" style="    padding: 16px 10px 10px 80px;">

                    <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">


                    <div class=" row color1 font2">
                        <div class="col-sm-12">
                            <a href="https://www.google.ca" class="color2">
                                <h5 class="font1 fontGrand2">
                                    <span> <?= $monServ->getTypeService(); ?> </span>
                                </h5>
                            </a>

                        </div>
                        <div class="col-sm-12">
                            <div>
                                <?php
                                for ($i = 0; $i < $nbreEtoile; $i++) {
                                    ?>
                                    <img src="img/star.png"/>
                                    <?php
                                }
                                ?>
                                <?php
                                for ($i = 0; $i < 5 - $nbreEtoile; $i++) {
                                    ?>
                                    <img src="img/starvide.png"/>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p>Heure de debut: <span> <?= $monServ->getHeureDebut() ?> h </span></p>
                            <p>Heure de la fin : <span><?php echo $Heure; ?></span></p>
                            <p>Salaire: <span><?= $monServ->getRemuneration() ?> $/h</span></p>

                        </div>
                        <div class="col-sm-6">
                            <p><i class="far fa-calendar-check"></i> Date du Service: <span
                                        style="font-family: Times New Roman"> <?php echo $dateS; ?> </span></p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="font1 fontGrand4">Commentaire </h4>
                            <div class="font1 blockCommentaire fontGrand5 color3"><?php echo $commentaire; ?>


                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <?php
            }
            }



            ?>

        </div>
    </div>