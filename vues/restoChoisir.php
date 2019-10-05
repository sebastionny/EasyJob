<?php
$nom="Amelia";
$nbreEtoile=4;
?>
            <div class="container">
                <div class="col space30 pb-1">
                    <h3 class="font1 fontGrand1 color2">Choisir mes employés</h3>
                </div>

                <!-- Section mes employes -->
                <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-12 ">
                            <div class="font2 fontGrande1  space30 col-md-5 color2">
                                <p> <span class="font-weight-bold">Demande:</span> Serveur/se </p> </br>
                                <p> <span class="font-weight-bold">Date:</span>  12/08/2019 <p>
                            </div>
                                <div class="container">
                                    <div class="col-md-12 font2"  align="center" >
                                        <div class="row resto" >
                                            <div class="col-md-12 ">
                                                <div class="item color1 ">
                                                    <img src="./img/myAvatar.jpg" class="img-fluid " alt="Cette image n'est pas disponible">
                                                    <div class="color1">
                                                        <h5 class="font1 fontGrand2 color1 pt-2 pb-2" style="position: absolute; top: 20px; left: 100px;"> Amelia Bernardes </p></a>
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
                                            <img src="./img/myAvatar.jpg" class="img-fluid " alt="Cette image n'est pas disponible">
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
                                                            <p> Langues <span> Français, anglais et arabe </span>  </p>
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
    </div>
</div>
</div>

