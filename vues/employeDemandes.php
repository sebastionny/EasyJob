<html lang="en">
<?php require_once('include/headEmploye.php'); ?>

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
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Choisir mes employés</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes offres de service</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>
            </div>
        </div>

        <section class="col-md-9 lineCote">
            <div class="container">
                <div class="col space30 pb-3">
                    <h3 class="font1 fontGrand1 color2">Mes services</h3>
                </div>
                <div class="row resto">

                    <div class="col-md-12 ">
                        <div class="item color1">
                            <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">
                            <div class="color1">
                                <h5 class="font1 fontGrand2" >
                                <a href="https://www.google.ca" > <span class="color1" style="position: absolute; top: 20px; left: 100px;"> Tacos Amelia </span></a>
                                </h5>
                                    <p> <i class="fas fa-map-pin"></i> 3479 Boulevard Rosemont, Montréal, H1T 3GJ, CA </p>
                                    <p> <i class="far fa-calendar-check"></i> Date: <span> 23/09/2019 </span>  </p>
                                    <p> <i class="far fa-clock"></i> Début: <span>12h</span> <span style="position: absolute; left: 250px;">Départ: </span> <span style="position: absolute; left: 310px;"> 18h </span>
                                    <p ><i class="fas fa-dollar-sign"></i> Salaire: 14/h</p>
                                    <h4 class="font1 fontGrand4 space30">Description </h4>
                                    <div class="monbloc">
                                    <p class="font2">Je chercher une serveuse sympa et qui aime travailler avec le public</p>
                                    </div>
                                    <hr color="white">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-outline-primary btn-lg btn-line1" > REFUSER</button>
                                        <button type="submit" class="btn btn-primary btn-lg "> ACCEPTER</button>
                                    </div>
                                    </div>
                        </div>
                    </div>

            </div>
        </section>

    </div>
</div>
</div>




<?php     require_once('include/footer.php'); ?>
</html>