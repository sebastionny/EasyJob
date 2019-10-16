                    
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
                                        function cherchedDay($dayOk){
                                            for($i = 0; $i < sizeof( $_SESSION["dispo"]); $i++ ){
                                                if($dayOk ==  $_SESSION["dispo"][$i]->getJour()){
                                                    return "checked";
                                                }
                                            }
                                        }
                                    } else{
                                        function cherchedDay(){
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
                                                <input name="saveDispo"  type="hidden" />
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

                                    <?php
                                    $f = $t = $m = $d = "";

                                    if (ISSET($_SESSION['infoEmploye'])){
                                            $f = $_SESSION['infoEmploye']->getFonction();
                                            $t = $_SESSION['infoEmploye']->getExperience();
                                            $m = $_SESSION['infoEmploye']->getFonction();
                                            $d = $_SESSION['infoEmploye']->getQualite();
                                    }
                                    ?>
                                    <?php if (ISSET($_REQUEST["field_messages"]["mesExp"]))
                                        echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mesExp"]."</span>";
                                    ?><br/>

                                    <form action ="" method="post">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Fonction</label>
                                                <div class="col-md-7">
                                                <select id="idFoction" class="form-control" name="fonction">
                                                    <option >Choisir votre poste</option>
                                                    <option >Serveur(se)</option>
                                                    <option >Cuisinier</option>
                                                    <option >Patissiere(ere)</option>
                                                    <option >Service au comptoir</option>
                                                    <option >Plongeur</option>
                                                    <option >commis entretien </option>
                                                </select>
                                                </div>
                                            </div>
                                    
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Temps d'expérience</label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <select id="idNbr" class="form-control" name="experience" >
                                                                <?php
                                                                    for ($i=1; $i < 13 ; $i++){
                                                                ?>
                                                                <option value="<?= $i?>"><?= $i?></option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="col-sm-12">
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="quantiter" id="mois" value="anne" >
                                                                <label class="form-check-label" for="mois">
                                                                    année(s)
                                                                </label>
                                                                </div>
                                                                <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="quantiter" id="anne" value="mois" >
                                                                <label class="form-check-label" for="anne">
                                                                    mois
                                                                </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>


                                        <?php ?>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Description</label>
                                                <div class="col-md-7">
                                                <textarea class="form-control" name="description" rows="5"><?=$d?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <input name="action" value="profilEmploye" type="hidden" />
                                                    <input name="mesExperiences" type="hidden" />
                                                    <button type="submit" class="nav-link btn btn-primary " onclick="return checked();">SAUVEGARDER</button>
                                                </div>
                                            </div>

                                    </form>

                                    <!--<div class="col-sm-12 invFond">
                                        <h4 >Information enregistrer</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="color2">Fonction: </span> <?/*= $_SESSION['infoEmploye']->getFonction();*/?>
                                                <span class="color2">Experience: </span> <?/*= $_SESSION['infoEmploye']->getExperience();*/?>
                                            </div>
                                            <div class="col-12">
                                                <div class="color2">Descripción</div>
                                                <p><?/*= $_SESSION['infoEmploye']->getQualite();*/?></p>
                                            </div>

                                        </div>
                                    </div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Section mon Resto FIN -->

                    <!-- Section Mes références -->
                    <div class=" shadow-lg p-3 mb-5 bg-white rounded col-sm-12 col-lg-10">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-12 color2">Mon Références</h2>
                         <div class="container font2">

                             <?php
                             $nomRe = $telRe = "";

                             if (ISSET($_SESSION['infoEmploye'])){
                                 $nomRe = $_SESSION['infoEmploye']->getNomRef();
                                 $telRe = $_SESSION['infoEmploye']->getTelRef();;
                             }
                             ?>
                             <?php if (ISSET($_REQUEST["field_messages"]["mesRef"]))
                                 echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mesRef"]."</span>";
                             ?><br/>


                             <div class=" justify-content-center">
                                <div class="col-md-12 font2">

                                    <form action="" method="post">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Nom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" name="nomRef" value="<?=$nomRe?>" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Téléphone</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" name="telRef" value="<?=$telRe?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-5">

                                                        </div>
                                                        <div class="col-lg-6 col-md-7">
                                                            <input name="action" value="profilEmploye" type="hidden" />
                                                            <input name="mesReference" type="hidden" />
                                                            <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>

                                    <!--<div class="col-sm-12 invFond">
                                        <h4 >Information enregistrer</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="color2">Nom: </span> <?/*= $_SESSION['infoEmploye']->getNomRef();*/?>
                                                <span class="color2">Téléphone: </span> <?/*= $_SESSION['infoEmploye']->getTelRef();*/?>
                                            </div>
                                        </div>
                                    </div>-->

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

                                    <?php
                                    $nom = $prenom =  $courriel = $motdepasse = $adresse = $code = $tel = "";

                                    if (ISSET($_SESSION['infoEmploye'])){
                                        $nom = $_SESSION['infoCompte']->getNom();
                                        $prenom = $_SESSION['infoCompte']->getPrenom();
                                        $courriel = $_SESSION['infoCompte']->getCourriel();
                                        $motdepasse = $_SESSION['infoCompte']->getMotDePasse();
                                        $tel = $_SESSION['infoEmploye']->getTel();
                                        $adresse = $_SESSION['infoEmploye']->getAdresse();
                                        $code = $_SESSION['infoEmploye']->getCodePostal();
                                    }
                                    ?>
                                    <?php if (ISSET($_REQUEST["field_messages"]["mesRef"]))
                                        echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mesRef"]."</span>";
                                    ?><br/>

                                    <form>
                                            <div class="form-group row">
                                                <label for="nom" class="col-md-5 col-form-label">Nom</label>
                                                <div class="col-md-7">
                                                <input name="nom" type="text" class="form-control" value="<?=$nom?>" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="prenom" class="col-md-5 col-form-label">Prénom</label>
                                                <div class="col-md-7">
                                                <input name="prenom" type="text" class="form-control" value="<?=$prenom?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sexeSelect" class="col-md-5 col-form-label">Sexe</label>
                                                <div class="col-md-7">
                                                <select name="sexeSelect" id="idSexeSelect" class="form-control">
                                                    <option value="f">Femme</option>
                                                    <option value="h">Homme</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Date de naissance</label>
                                                <div class="col-md-7">
                                                 
                                                            <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dateNaissance" data-link-format="yyyy-mm-dd">
                                                                <input name="dateNaissance" class="form-control" type="text" id="idDateNaissance" readonly>
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            </div>
                                                            <input type="hidden" id="dateNaissance" value="" /><br/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="courriel" class="col-md-5 col-form-label">Courriel</label>
                                                <div class="col-md-7">
                                                    <input name="courriel" type="email" class="form-control" value="<?=$courriel?>" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="motDePasse" class="col-md-5 col-form-label">Mot de passe</label>
                                                <div class="col-md-7">
                                                <input name="motDePasse" type="password" class="form-control" value="<?=$motdepasse?>">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="tel" class="col-md-5 col-form-label">Télephone</label>
                                                <div class="col-md-7">
                                                <input name="tel" type="text" class="form-control" value="<?=$tel?>">
                                               <!--     <div class="fontCenter">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">C'est un celluraire</label>
                                                    </div> --->
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="adresse" class="col-md-5 col-form-label">Adresse</label>
                                                <div class="col-md-7">
                                                <input name="adresse" type="text" class="form-control" value="<?=$adresse?>" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="provice" class="col-md-5 col-form-label">Province</label>
                                                <div class="col-md-7">
                                                <select name="provice" id="idProvince" class="form-control">
                                                    <option value="quebec">Québec</option>
                                                    <option value="ontario" >Ontario</option>
                                                    <option value="default">...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="ville" class="col-md-5 col-form-label" onclick="lookInfo()">Ville</label>
                                                <div class="col-md-7">
                                                <select name="ville" id="idVille" class="form-control">
                                                    <option value="montreal">Montréal</option>
                                                    <option value="laval">Laval</option>
                                                    <option value="longueil">longueil</option>
                                                    <option value="default">...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="codePostal" class="col-md-5 col-form-label">Code postal</label>
                                                <div class="col-md-7">
                                                <input name="codePostal" type="text" class="form-control" value="<?=$code?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <input name="action" value="profilEmploye" type="hidden" />
                                                    <input name="monCompte" type="hidden" />
                                                    <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                </div>
                                            </div>

                                    </form>



                                    <!--<div class="col-sm-12 invFond">
                                        <h4 >Information enregistrer</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <p><span class="color2">Nom: </span> <?/*= $_SESSION["infoCompte"]->getNom() . " ". $_SESSION["infoCompte"]->getPrenom() ;*/?></p>
                                                        <p><span class="color2"> Sexe: </span> <?/*= $_SESSION['infoEmploye']->getSexe();*/?></p>
                                                        <p><span class="color2"> Date de naissance: </span> <?/*= $_SESSION['infoEmploye']->getDateNaissance();*/?></p>
                                                        <p><span class="color2"> Courriel: </span> <?/*= $_SESSION["infoCompte"]->getCourriel();*/?></p>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <p><span class="color2"> Téléphone: </span> <?/*= $_SESSION['infoEmploye']->getTel();*/?></p>
                                                        <p><span class="color2"> Adresse: </span> <?/*= $_SESSION['infoEmploye']->getAdresse()  . " " . $_SESSION['infoEmploye']->getCodePostal();*/?></p>
                                                        <p><span class="color2"> Province: </span> <?/*= $_SESSION['infoEmploye']->getProvince();*/?></p>
                                                        <p><span class="color2"> Ville: </span> <?/*= $_SESSION['infoEmploye']->getVille();*/?></p>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>-->

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

    function checked(){

        if(document.getElementById("mois").checked || document.getElementById("anne").checked)
            return true;
        else{
            alert("Avez-vous oublié coché l'année ou le mois ?");
            return false;
        }
    }


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
    }
    ?>

    <script>
        function lookInfo(){
            document.getElementById('idVille').value = "<?=$_SESSION["infoEmploye"]->getVille() ?>";
            document.getElementById('idSexeSelect').value = "<?=$_SESSION["infoEmploye"]->getSexe() ?>";
            document.getElementById('idProvince').value = "<?=$_SESSION["infoEmploye"]->getProvince() ?>";
            document.getElementById('idNbr').value = "<?=$_SESSION["infoEmploye"]->getExperience() ?>";
            document.getElementById('idFoction').value = "<?=$_SESSION["infoEmploye"]->getFonction() ?>";
            document.getElementById('idDateNaissance').value = "<?=$_SESSION["infoEmploye"]->getDateNaissance() ?>";
        }
        window.onloadstart = lookInfo();
        </script>





