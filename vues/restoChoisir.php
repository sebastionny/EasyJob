<?php
$nom="Amelia";
$nbreEtoile=4;
?>
            <div class="container">
                <div class="col space30 pb-1">
                    <h3 class="font1 fontGrand1 color2">Choisir mes employés</h3>
                </div>

                <?php 
                    $ser = $_SESSION['mesService'];
                    $flat = false;
                    foreach ($ser as $s => $v) { ?>
                    
                <!-- Section mes employes -->
                <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-12 ">
                        <div class="font2  fontGrand4">
                            <div class="font-weight-bold "> <span class="color2"> <?=$ser[$s]['i'][2]?> </span>| Date Service: <span class="color2">  <?=$ser[$s]['i'][1]?> </span></div> 
                        </div>

                        <?php 
                        $emp = $ser[$s]['e'];
                        foreach ($emp as $e => $v) {
                            $flat = true;
                            ?>
                            
                        <div class="font2 fontGrande1 space30 color2 container">
                            <div class="row">
                                
                            <div class="col-3">
                                <img src="<?= $emp[$e][7] ?>" class="img-fluid " alt="Cette image n'est pas disponible">
                            </div>
                            
                            <div class="col-9 color3">
                                <h5 class="font1 fontGrand2"> <?= $emp[$e][1] . ' ' . $emp[$e][2] ?></h5>
                                <div class="justify-content-center" textalign="left">
                                    
                                </div>
                                <div class="row" textalign="left">
                                    <div class="col-12">
                                        <div class="fontGrande3 ">
                                            <strong>Sexe:</strong> <?= $emp[$e][3] ?> -- <strong>Ville:</strong>  <?= $emp[$e][4] ?> --  <strong>Experience:</strong>  <?= $emp[$e][5] ?>  mois 
                                        </div>
                                        <div>
                                            <h4 class="font1 fontGrand4 mt-2">Profil </h4>
                                            <p class="font2"><?=$emp[$e][6] ?> </p>
                                            <hr color="white">
                                        </div>
                                        <div class="float-md-right">
                                            <button type="submit" class="btn btn-outline-primary btn-lg btn-line1 font1" > REFUSER</button>
                                            <button type="submit" class="btn btn-primary btn-lg font1 "> ACCEPTER</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div> 
                        <?php }?>

                </div>
                <?php }
    
                if($flat == false){ ?>
                    <h3 class="font2 fontGrand2 fontCenter">On n'a pas encore trouvé des employés.</h3>
                <?php  }?>
        
            </div>
    </div>
</div>
</div>

