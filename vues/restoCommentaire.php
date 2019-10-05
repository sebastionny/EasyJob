    <?php
    $nom="Assia";
    $dateS="12-06-2019";
      $prenom="Hamouma";
      $commentaire="Service tres aimable et mon bol était exquis. J'ai pris celui au tempeh, rassasiant"
              . "The restaurent had a homey ambience and the prix fixe menu was an experience your taste buds will never forget."
              . " Not to slight a sommelier's dream of a wine list. et goûteux!";
      $nbreEtoile=3;?>

  <!--

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
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Mon Profil</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Choisir mes employés</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes offres de service</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>
            </div>   
             </div>
              <section class="col-md-9 lineCote">
            <div class="container">
                !-->
                <div class="col space30 pb-3">
                    <h3 class="font1 fontGrand1 color2">Mes Commentaires</h3>
                </div>
                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="item commentaire color3">
                            <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">
                            <div class="color3">
                                <h5 class="font1 fontGrand2" >
                                <a href="https://www.google.ca" > <span class="color3"> <?php echo $nom.'  '.$prenom;?></span></a>
                                </h5>
                                    <p > <i class="far fa-calendar-check" ></i> Date de Service: <span style="font-family: Times New Roman"> <?php echo $dateS;?> </span>  </p>
                                    
                                    <h4 class="font1 fontGrand4">Commentaire </h4>
                                    <p class="font2"><?php echo $commentaire;?> </p>
                        
                                    <hr class="color1">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div>
                                                <?php
                                                for($i=0;$i< $nbreEtoile;$i++){
                                                    ?>
                                                    <img src="./img/etoile.jpg"/>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                for($i=0;$i< 5-$nbreEtoile;$i++){
                                                    ?>
                                                    <img src="./img/etoilevide.png"/>
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                    </div>
                                    </div>
                        </div>
                    </div>
            </div>
      <!--  </section>!-->



         



