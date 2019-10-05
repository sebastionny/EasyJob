                
<div class="row justify-content-center">  
<div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-10 ">
         <h2 class="font2 fontGrande2 fontCenter space30 col-md-12 color2">Je postule une offre de service</h2>
         <div class="container">

            <div class="justify-content-center">
                <div class="col-md-12 font2">

<form>
                
                <div class="form-row">
                    <div class="col">
                    <label for="fonction">Fonction</label>
                    </div>
                    <div class="col">
                    <label for="jour">Jour</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                    <select id="selection" class="form-control">
                     <option value="">Serveur(se)</option>
                       <option value="">Plongeur(se)</option>
                       <option value="">Cuisiniè(e)</option>
                       <option value="">Aide Cuisiniè</option>
                     </select>
                    </div>
                    <div class="col">
                    <input id="datepicker" width="276" />
                    <script>
                      $('#datepicker').datepicker({
                          uiLibrary: 'bootstrap4'
                      });
                    </script>
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
                        <select id="selection" class="form-control">
                        <option value="">Montréal</option>
                        <option value="">Laval</option>
                        <option value="">Québec</option>
                        <option value="">longueuil</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="rangePrimary" name="rangePrimary" value="" />    
                        <p id="priceRangeSelected"></P>
                    </div>
                </div>

                <div class="col space30">
                    </div>
                <div class="form-row">
                    <div class="col">
                    <label for="remuneration">Rémunération</label>
                    </div>
                    <div class="col">
                    <label for="experience">Éxperience</label>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col">
                            <select id="selection" class="form-control">
                            <option value="">12</option>
                            <option value="">13</option>
                            <option value="">14</option>
                            <option value="">15</option>
                            <option value="">16</option>
                            <option value="">17</option>
                            <option value="">18</option>
                            <option value="">19</option>
                            </select> 
                    </div>
                    <div class="col">
                        <label for="dolar">$ &nbsp; &nbsp;  &nbsp;</label>
                   
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paye" id="radio3" value="option3" checked>
                            <label class="form-check-label" for="radio3">Heure</label>
                        </div>
                    </div>
                    
                    <div class="col">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="paye" id="radio4" value="option4">
                            <label class="form-check-label" for="radio4">Par service</label>
                    </div>
                </div>
                  
                <div class="col">
                    <select id="selection" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                        <option value="">7</option>
                        <option value="">8</option>
                    </select> 
                </div>
                    
                &nbsp; &nbsp;  &nbsp; &nbsp; 
                   
                <div class="col">
                    <div class="form-check">
                            <input class="form-check-input" type="radio" name="exp" id="radio1" value="option1" checked>
                            <label class="form-check-label" for="radio1">année(s) </label>
                    </div>
                </div>
                <div class="col">                           
                                
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="exp" id="radio2" value="option2">
                        <label class="form-check-label" for="radio2">mois</label>
                        </div> 
                </div> 
                
            </div>
           
                
      <div class="col space30">
                    </div>
                <div class="form-group">
                   <label for="desc">Description de service</label>
                   <textarea class="form-control" id="desc" rows="3" placeholder="Ici vous faite une bref déscription de votre service"></textarea>
                 </div>
                 <div class="form-group">
                 <input type="submit" class="btn btn-primary btn-lg"  value="Chercher" />
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
		minView: 2,
		forceParse: 0
    });

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

