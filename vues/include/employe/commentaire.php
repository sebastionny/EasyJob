<div class="container">
    <div class="col space30 pb-3">
        <h3 class="font1 fontGrand1 color2">Mes Commentaires</h3>
        <h5 class="font1" > Vous etes Cote a </h5>

        <div class="font1 fontGrand4">
            <?php
            $nbreEtoile = 4;
            $proffetion = 'Serveur';
            $HeureDe = 18;
            $Heure = 20;
            $salaire = 12.30;
            $ville = 'Laval';
            $ZIP = 'H2A3h2';
            $dateS = '2019-03-02';
            $commentaire = 'lorem sdfasdfasd fasd fasdf asdfasdfasdf asdfasdfasdf ';



            for($i=0;$i< $nbreEtoile;$i++){
                ?>
                <img src="img/etoile.jpg"/>
                <?php
            }
            ?>
            <?php
            for($i=0;$i< 5-$nbreEtoile;$i++){
                ?>
                <img src="img/etoilevide.png"/>
                <?php
            }
            ?>
            <br/>
            <?php echo $nbreEtoile;?> Etoiles
        </div>

    </div>
    <div class="row resto">

        <div class="col-md-12 ">
            <div class="item color1" style="    padding: 16px 10px 10px 80px;">

                <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">


                <div class=" row color1 font2">
                    <div class="col-sm-12">
                        <a href="https://www.google.ca" class="color2" >
                            <h5 class="font1 fontGrand2" >
                                <span> <?php echo $proffetion;?> </span>
                            </h5>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <p>Heure Depart: <span> <?php echo $HeureDe;?> h </span></p>
                        <p>Heure : <span><?php echo $Heure;?></span></p>
                        <p>Salaire: <span><?php echo $salaire;?> /h</span></p>

                    </div>
                    <div class="col-sm-6">
                            <p>Ville:   <span> <?php echo $ville;?> </span></p>
                            <p>ZIP :    <span>  <?php echo $ZIP;?>  </span></p>
                        <p> <i class="far fa-calendar-check" ></i> Date de Service: <span style="font-family: Times New Roman"> <?php echo $dateS;?> </span>  </p>
                    </div>
                    <div class="col-md-12">
                        <h4 class="font1 fontGrand4">Commentaire </h4>
                        <div class="font2 blockCommentaire color3"><?php echo $commentaire;?>
                            <div class="col-sm-12">
                                <div>
                                    <?php
                                    for($i=0;$i< $nbreEtoile;$i++){
                                        ?>
                                        <img src="img/etoile.jpg"/>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    for($i=0;$i< 5-$nbreEtoile;$i++){
                                        ?>
                                        <img src="img/etoilevide.png"/>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                    </div>

                    </div>
                    <div class="col-sm-6"> </div>
                    <div class="col-sm-6">
                        <div class="float-right space30">
                            <button type="submit" class="btn  btn-line font1" > Suivant</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>