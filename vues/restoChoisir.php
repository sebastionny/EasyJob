
<?php require_once('vues/include/headTest.php');
$nom="Amelia";
$nbreEtoile=4;
?>
<div class="container-fluid space100 ">
    <div class="row">
        <div class="col-md-3">
            <img src="./img/pp.jpg" alt="Profil de ..." class="img-thumbnail profil ">
            <form class="space30 fontCenter">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary ">Changer </button>
            </form>
            <div class="space100 font2 fontGrand3 ">
                <a href="#" class="btn btn-line1 btn-block color1 "> Mon Profil</a>
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Choisir mes employés</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes offres de service</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>
            </div>
        </div>
        <section class="col-md-9 lineCote">
            <div class="container">
                <div class="col space30 pb-1">
                    <h3 class="font1 fontGrand1 color2">Choisir mes employés</h3>
                </div>

                <!-- Section mes employes -->
                <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-12 ">
                            <div class="font2 fontGrande1  space30 col-md-5 color2">
                                <p1 > <span class="font-weight-bold">Demande:</span> Serveur/se </p1> </br>
                                <p1> <span class="font-weight-bold">Date:</span>  12/08/2019 <p1>
                            </div>
                                <div class="container">
                                    <div class="col-md-12 font2"  align="center" >
                                        <div class="row resto" >
                                            <div class="col-md-12 ">
                                                <div class="item color1 ">
                                                    <img src="./img/myAvatar.jpg" class="img-fluid " alt="Cette image n'est pas disponible">
                                                    <div class="color1">
                                                        <h5 class="font1 fontGrand2 color1 pt-2 pb-2" style="position: absolute; top: 20px; left: 100px;"> Amelia Bernrdes </p></a>
                                                        </h5>
                                                        <div class="justify-content-center" align="left">
                                                            <p >
                                                                <?php
                                                                for($i=0;$i< $nbreEtoile;$i++){
                                                                    ?>
                                                                    <ion-icon  style="color:#FF8C00; font-size:25px" name="star"></ion-icon>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                for($i=0;$i< 5-$nbreEtoile;$i++){
                                                                    ?>
                                                                    <ion-icon style="color:#FF8C00; font-size:25px"  name="star-outline"></ion-icon>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="row" align="left">
                                                            <div class="col-12">
                                                                <div class=" col-12 font1 fontGrande3 col-md-9 color1">
                                                                    <p >  Sexe:<span> Femme </span> </p>
                                                                    <p> Langues <span> Français, anglais et portugais </span>  </p>
                                                                </div>

                                                                <h4 class="font2 fontGrand3 space30 ">Profil </h4>
                                                                <p class="font2">Je plus de 5 ans d'expérience comme serveuse. J'aime le public </p>
                                                                <hr color="white">
                                                                <div class="float-md-right">
                                                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-line1 font1" > REFUSER</button>
                                                                    <button type="submit" class="btn btn-primary btn-lg font1 "> ACCEPTER</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                </br>
                    </br>
                    </br>
                    </br>

                            <div class="col-md-12 font2"  align="center" >
                                <div class="row resto" >
                                    <div class="col-md-12 ">
                                        <div class="item color1 ">
                                            <img src="./img/AssiaAvatar.jpg" class="img-fluid " alt="Cette image n'est pas disponible">
                                            <div class="color1">
                                                <h5 class="font1 fontGrand2 color1 pt-2 pb-2" style="position: absolute; top: 20px; left: 100px;"> Assia Hamouma </p></a>
                                                </h5>
                                                <div class="justify-content-center" align="left">
                                                    <p >
                                                        <?php
                                                        for($i=0;$i< $nbreEtoile;$i++){
                                                            ?>
                                                            <ion-icon  style="color:#FF8C00; font-size:25px" name="star"></ion-icon>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        for($i=0;$i< 5-$nbreEtoile;$i++){
                                                            ?>
                                                            <ion-icon style="color:#FF8C00; font-size:25px"  name="star-outline"></ion-icon>
                                                            <?php
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="row" align="left">
                                                    <div class="col-12">
                                                        <div class=" col-12 font1 fontGrande3 col-md-9 color1">
                                                            <p >  Sexe:<span> Femme </span> </p>
                                                            <p> Langues <span> Français, anglais et arable </span>  </p>
                                                        </div>

                                                <h4 class="font2 fontGrand3 space30 ">Profil </h4>
                                                <p class="font2">Je plus de 7 ans d'expérience comme serveuse. Je parle plusieurs langues </p>
                                                <hr color="white">
                                                <div class="float-md-right">
                                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-line1 font1" > REFUSER</button>
                                                    <button type="submit" class="btn btn-primary btn-lg font1 "> ACCEPTER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                </div>



        </section>



    </div>
</div>
</div>

<?php     require_once('vues/include/footer.php'); ?>
