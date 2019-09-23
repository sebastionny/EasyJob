                    
                <div class="row justify-content-center">    


                <!-- Section mon disponibilité -->
                <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-10 ">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-md-12 color2">Mon disponibilité</h2>
                         <div class="container">

                            <div class="justify-content-center">
                                <div class="col-md-12 font2">
                                <form method="post">

                                    <?php
                                    $jours = null;

                                    if(ISSET($_SESSION["dispo"])){
                                        var_dump($_SESSION["dispo"]);
                                        function cherchedDay($dayOk){
                                            for($i = 0; $i < sizeof( $_SESSION["dispo"]); $i++ ){
                                                if($dayOk ==  $_SESSION["dispo"][$i]->getJour()){
                                                    return "checked";
                                                }
                                                return "";
                                            }

                                        }
                                    } else{
                                        function cherchedDay($dayOk){
                                            return "";
                                        }
                                    }

                                    if (ISSET($_REQUEST["field_messages"]["checkedDay"]))
                                        echo "<col-sm-12 class=\"warningMessage text-center \">".$_REQUEST["field_messages"]["checkedDay"]."</col-sm-12>";
                                    ?>

                                        <div class="form-group row">
                                            <label for="dispoLundi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoLundi"
                                                name="jours[]" value="0" <?= cherchedDay('lundi')  ?> > Lundi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary" id="lundi" name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoMardi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoMardi"
                                                       name="jours[]" value="1" <?= cherchedDay("mardi")  ?> > Mardi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary" id="mardi" name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoMercredi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoMercredi"
                                                       name="jours[]" value="2" <?= cherchedDay("mercredi")  ?>> Mercredi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary" id="mercredi" name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoJeudi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoJeudi"
                                                       name="jours[]" value="3" <?= cherchedDay("jeudi")  ?>> Jeudi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary" id="jeudi" name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoVendredi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoVendredi"
                                                       name="jours[]" value="4" <?= cherchedDay("vendredi")  ?>> Vendredi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary" id="vendredi"  name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoSamedi" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoSamedi"
                                                       name="jours[]" value="5" <?= cherchedDay("samedi")  ?>> Samedi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary"  id="samedi"  name="tabHeure[]" value="" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="dispoDimache" class="col-sm-3 col-form-label">
                                                <input type="checkbox" class="form-check-input" id="dispoDimache"
                                                       name="jours[]" value="6" <?=cherchedDay("dimache")  ?>>Dimache</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="rangePrimary"  id="dimache" name="tabHeure[]" value="" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                            <div class="col-md-7">
                                                <input name="action" value="profilEmploye" type="hidden" />
                                                <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                            </div>
                                        </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Section mon disponibilité FIN -->

                    <!-- Section mon Resto -->
                     <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-10 ">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-md-12 color2">Mes expériences</h2>
                         <div class="container">

                            <div class="justify-content-center">
                                <div class="col-md-12 font2">

                                    <form>
                                            
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Fonction</label>
                                                <div class="col-md-7">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Serveur(se)...</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                            </div>
                                    
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Temps d'expérience</label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <select id="inputState" class="form-control">
                                                                <option selected>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="col-sm-12">
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                                                <label class="form-check-label" for="gridRadios1">
                                                                    année(s)  
                                                                </label>
                                                                </div>
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                                <label class="form-check-label" for="gridRadios2">
                                                                    mois
                                                                </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Description</label>
                                                <div class="col-md-7">
                                                <textarea class="form-control"  rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                </div>
                                            </div>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Section mon Resto FIN -->

                    <!-- Section Mes références -->
                    <div class=" shadow-lg p-3 mb-5 bg-white rounded col-sm-12 col-lg-10">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-12 color2">Mon Références</h2>
                         <div class="container">

                            <div class=" justify-content-center">
                                <div class="col-md-12 font2">

                                    <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Nom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Téléphone</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-7">
                                                            <button type="submit" class="nav-link btn btn-line1 ">SAUVEGARDER</button>
                                                        </div>
                                                        <div class="col-lg-6 col-md-4">
                                                            <button type="submit" class="nav-link btn btn-primary ">AJOUTER</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section Mes références FIN -->

                    <!-- Section mon compte -->
                    <div class=" shadow-lg p-3 mb-5 bg-white rounded col-sm-12 col-lg-10">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-12 color2">Mon Compte</h2>
                         <div class="container">

                            <div class=" justify-content-center">
                                <div class="col-md-12 font2">

                                    <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Nom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Prénom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Sexe</label>
                                                <div class="col-md-7">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Femme</option>
                                                    <option>Homme</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Date de naisance</label>
                                                <div class="col-md-7">
                                                 
                                                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                                <input class="form-control" type="text" value="" readonly>
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                            <input type="hidden" id="dtp_input2" value="" /><br/>
                                           
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Courriel</label>
                                                <div class="col-md-7">
                                                    <input type="email" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Mot de passe</label>
                                                <div class="col-md-7">
                                                <input type="password" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Télephone</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control">
                                                <div class="fontCenter">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">C'est un celluraire</label>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Adresse</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Province</label>
                                                <div class="col-md-7">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Quebec...</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Ville</label>
                                                <div class="col-md-7">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Montréal...</option>
                                                    <option>...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Code postal</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                </div>
                                            </div>

                                           

                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section mon compte FIN -->
                </div>


      
            <!--Plugin CSS file with desired skin-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>

<script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script> 
<script type="text/javascript" src="js/ion.rangeSlider.js" charset="UTF-8"></script> 
<script type="text/javascript">

	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

    var custom_values = [ "0H","1H", "2H","3H","4H","5H","6H","7H","8H","9H","10H","11H","12H","13H","14H","15H","16H","17H","18H","29H","20H","21H","22H","23H","24H"];

    // be careful! FROM and TO should be index of values array
    var my_from = custom_values.indexOf("18H");
    var my_to = custom_values.indexOf("24H");

    $(".rangePrimary").ionRangeSlider({
        type: "int",
        grid: true,
        from: my_from,
        to: my_to ,
        values: custom_values
    });


    // var slider = $("#mardi").data("ionRangeSlider");
    //
    // slider.update({
    //     from:  custom_values.indexOf("8H"),
    //     to:  custom_values.indexOf("9H")
    // });


</script>

<!--Affiher le changemente-->

    <?php
    if(ISSET($_SESSION["dispo"])){

        for($i = 0; $i < sizeof( $_SESSION["dispo"]); $i++ ){

            ?>
            <script type="text/javascript">
            var slider = $("#<?= $_SESSION["dispo"][$i]->getJour()?>").data("ionRangeSlider");

                    slider.update({
                from:  custom_values.indexOf("<?=$_SESSION["dispo"][$i]->getHeureDebut()?>H"),
                to:  custom_values.indexOf("<?=$_SESSION["dispo"][$i]->getHeureFin()?>H")
            });
            </script>
            <?php
        }


//        for($i = 0; $i < sizeof( $_SESSION["dispo"]); $i++ ){
//            $horair = array('day'=> $_SESSION["dispo"][$i]->getJour(),
//                            'hourStart' => $_SESSION["dispo"][$i]->getHeureDebut(),
//                            'hourEnd' => $_SESSION["dispo"][$i]->getHeureFin());
//
//        }
//
//        $json = json_encode($horair);
//        $file = 'dispo.json';
//        file_put_contents($file, $json);


    }
    ?>





