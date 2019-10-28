                
<div class="row justify-content-center">  
<div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-10 ">
         <h2 class="font2 fontGrande2 fontCenter space30 col-md-12 color2">Je postule une offre de service</h2>
         <div class="container">

            <div class="justify-content-center">
                <div class="col-md-12 font2">

                <?php if (ISSET($_REQUEST["field_messages"]["sendDemande"]))
                    echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["sendDemande"]."</span>";
                
                ?><br/>

        <form method="POST">
                <div class="form-row">
                    <div class="col">
                    <label for="fonction">Fonction</label>
                    <select id="selection" class="form-control" name="txtFonction">
                        <option >Serveur(se)</option>
                        <option >Cuisinier</option>
                        <option >Patissiere(ere)</option>
                        <option >Service au comptoir</option>
                        <option >Plongeur</option>
                        <option >Commis entretien </option>
                     </select>
                    </div>
                    <div class="col">
                    <label for="jour">Jour</label>
                        <div class="input-group date form_date " data-date="" data-date-format="DD yyyy-mm-dd" data-link-field="dateNaissance" data-link-format="DD yyyy-mm-dd">
                            <input name="txtDateService" class="form-control" type="text" id="idDateNaissance" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dateNaissance" value="" />

                    </div>
                </div>
                    
                <div class="col space30">
                    </div>
                <div class="form-row">
                    <div class="col">
                    <label for="ville">Ville</label>
                    </div>
                    <div class="col">
                    <label for="dispo">Disponibilité</label>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col">
                        <select name="txtVille" id="selection" class="form-control">
                        <option value="montreal">Montréal</option>
                        <option value="laval">Laval</option>
                        <option value="longueil">Longueil</option>
                        <option value="default">...</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="rangePrimary" name="txtHeureDebutFin" value="" />    
                        <p id="priceRangeSelected"></P>
                    </div>
                </div>

                <div class="col space30">
                    </div>
                <div class="form-row">
                    <div class="col">
                    <label for="remuneration">Rémunération heure</label>

                            <select id="selection" class="form-control" name = "txtSalaire">
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            </select> 

                    </div>
                    <div class="col">

                    <label for="experience">Éxperience (mois)</label>
                    <select id="selection" class="form-control" name="txtExperience">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="18">18</option>
                        <option value="20">Plus</option>
                    </select> 
                    
                    </div>
                    </div>
            
                
                 <div class="col space30"> </div>
                <div class="form-group">
                   <label for="desc">Description de service</label>
                    <textarea name="txtDescription" class="form-control" id="desc" rows="3" placeholder="Une brève description de votre service"></textarea>
                 </div>
                 <div class="form-group">
                    <input name="searchEmploye"type="hidden" />
                    <input name="action" value="demandeService" type="hidden" />
                    <input type="submit" class="btn btn-primary btn-lg"  value="CHERCHER" />
                 </div>
                        
        </form>

        </div>
        </div>
    </div>
</div>
    <!-- fin Section resto offres services -->
</div>


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
		minView: 3,
        defaultDate: new Date(),
		forceParse: 0
    });

    function formatDate() {
        var dayNames = [
            "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"
        ];
        var date = new Date();
        var getToday = dayNames[date.getDay()]+' '+date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
        return getToday;
    }

    document.getElementById('idDateNaissance').value = formatDate();


    var custom_values = [ "1H", "2H","3H","4H","5H","6H","7H","8H","9H","10H","11H","12H","13H","14H","15H","16H","17H","18H","29H","20H","21H","22H","23H","24H"];
    
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
	
</script>

