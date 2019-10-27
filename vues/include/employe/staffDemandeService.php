<div class="col space30 pb-3">
    <h3 class="font1 fontGrand1 color2">Demande en attente</h3>
</div>
<div class="row resto">

    <div class="col-md-12 ">


    
    <?php

    $services = $_SESSION['Service'];
    $s= '';
    $dispo    = $_SESSION['dispo'];
    $d='';
    $flat = false;    

    foreach ($services as $s){
        $jour = ProfilEmployeAction::getJour($s->getDate());
        $hd   = (int)$s->getHeureDebut();
        $hf   = (int)$s->getHeureFin();

        $restoDAO = new RestaurantDAO();
        $r = $restoDAO->findByIdEmployeur($s->getIdEmployeur());

        $accepteDAO = new AccepteDAO();
        $a = $accepteDAO->find($_SESSION['infoEmploye']->getIdEmploye(),$s->getIdService());
        foreach ($dispo as $d){
            $d_jour = $d->getJour();
            $d_hd = (int)$d->getHeureDebut();
            $d_hf = (int)$d->getHeureFin();

            if( $jour == $d_jour && $d_hd <= $hd && $d_hf >= $hf  ) {
                $flat = true;  
    
    ?>
        <div class="item color1">
            <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">
            <div class="color1">
                <h5 class="font1 fontGrand2" >
                    <span class="color1"> <?=$r->getNomRest(); ?> </span>
                </h5>
                <div class="row font2 ">
                    <div class="col-sm-7 mt-2"> <i class="fas fa-map-pin"></i> <?=$r->getAdresseRest() .' ' . $r->getVilleRest();  ?> </div>
                    <div class="col-sm-5"> <i class="far fa-calendar-check"></i> Date: <span> <?=$s->getDate(); ?> </span> </div>


                    <div class="col-sm-7 mt-2">
                        <i class="far fa-clock"></i> Début: <?=$s->getHeureDebut(); ?>h |  <i class="far fa-clock"></i> Fin: <?=$s->getHeureFin(); ?>h
                    </div>
                    <div class="col-sm-5 mt-2 font1 color2 fontGrand3"><i class="fas fa-dollar-sign"></i> Salaire: <?=$s->getRemuneration(); ?>/h
                    </div>


                    <div class="col-sm-12 font2 mt-4">
                        <div class="float-right">
                            <?php if($a != null && $a->getFait() == 0) {?>
                                <h3 class="font2 fontGrand3 fontCenter">Demande en attende </h3>
                            <?php } elseif($a != null && $a->getFait() == 1){?>
                                <h3 class="font2 fontGrand3 fontCenter">Service accepté </h3>
                            <?php }else {?>
                                <a class="btn btn-lg btn-primary" href="?action=profilEmploye&profil=mesService&idService=<?=$s->getIdService();?>"> ACCEPTER</a>
                            <?php }?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    <?php }}}
    
    if($flat == false){ ?>

        <h3 class="font2 fontGrand2 fontCenter">On n'a pas des offres. selon ton disponibilité </h3>

    <?php    }?>
    </div>
</div>
