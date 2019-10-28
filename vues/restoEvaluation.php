


<div class="container-fluid ">
    <div class="row">
        <section class="col-md-12">
            <div class="container">
                
				  <?php 
				  
				   $resto=$_SESSION["infoResto"];
                    $ser = $_SESSION['serviceFait'];
					$emp=$_SESSION["empFait"];
					if(isset($_SESSION["pas"])){
						?>
					
						<h3 class="font1 fontGrand1 color2">Pas de Service a Evaluer!!!!!!!!!!!
					</h3> 

					<?php	
					}elseif($_SESSION["accepteCom"])
					{?> 
                  <div class="col space30 pb-3">
                    <h3 class="font1 fontGrand1 color2">Évaluez votre service </h3>
                </div>
                <div class="row resto">

                    <div class="col-md-12 ">
                        <div class="item color1 font2">
                            <img src="img/resto3.png" class="img-fluid" alt="Cette image n'est pas disponible">
                                <div class="font2 fontGrand2 color2" >  <?php echo $resto->getNomRest() ?> </div>
                            <div class="color1">
                               
                               
							  	<p> <i class="fas fa-map-pin"></i> <?php echo $resto->getAdresseRest() ?> ,  <?php echo $resto->getVilleRest() ?> , <?php echo $resto->getCodePostalRest() ?> </p>
                                <p> <i class="far fa-calendar-check"></i> Date: <span> <?php echo $ser->getDate() ?>  </span>  </p>
                                <p> <i class="far fa-clock"></i> Début: <span><?php echo $ser->getHeureDebut() ?>h</span> <span style="position: absolute; left: 250px;">Fin: </span> <span style="position: absolute; left: 310px;"> <?php echo $ser->getHeureFin() ?>h </span>
                                <p ><i class="fas fa-dollar-sign"></i> Salaire: <?php echo $ser->getRemuneration() ?>/h</p>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="col-md-11 space30 form-group shadow-textarea font2">
                        <label class="fontGrand3 pt-2">Comment s'est passé le service réalisé par <span class="font1 color2"> <?php echo $emp->getNom() ?>  <?php echo $emp->getPrenom() ?> ? </span></label>
                        <span id="rateMe2"  class="empty-stars"></span>
                    <div class="form-group row">
                        <label class="control-label" >
                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                        </label>

                        <div class="form-group" id="rating-ability-wrapper">

                            <button type="button" class="btnrating btn btn-default btn-lg" onclick ="document.getElementById('etoiles').value=1;" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg"  onclick ="document.getElementById('etoiles').value=2;"data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg"  onclick ="document.getElementById('etoiles').value=3;" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg"  onclick ="document.getElementById('etoiles').value=4;"data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg"  onclick ="document.getElementById('etoiles').value=5;"data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>

                        <h3 class="bold rating-header">
                            <span id="etoile" class="selected-rating"  >0</span><small> / 5</small>
                        </h3>

                    </div> <form method="POST">
                        <textarea name="commentaire" class="form-control z-depth-1 font2 space30" id="exampleFormControlTextarea345" rows="4" placeholder="Écrivez votre commentaire..."></textarea>                        </div>
 <?php if (ISSET($_REQUEST["field_messages"]["commentaire"]))
                        echo "</br><span class=\"warningMessage\">".$_REQUEST["field_messages"]["commentaire"]."</span>";
                    ?>

                    <div class="col-md-12 ">  
					<input id="etoiles" name="etoiles" class="form-control" type="hidden"  />
                        <button type="submit" name="valider" class="nav-link btn btn-primary font1 " >ENVOYER</button>
						
						
						
                    </div>
					</form>
					
					 
                </div>
        </section>

    </div><?php
					
					}
					
					else{
						
					?>	
					
				<form method="POST">
                      <h3 class="font1 fontGrand1 color2">Votre commentaire a ete ajouté Merci!!
					</h3> 

                    <div class="col-md-12 ">
                        <button type="submit" name="suivant" class="nav-link btn btn-primary font1 ">Suivant</button>
                    </div>
					</form><?php
					}
					?>
</div>
</div>
		

<script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>

<script>
    jQuery(document).ready(function($){

        $(".btnrating").on('click',(function(e) {

            var previous_value = $("#selected_rating").val();

            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-"+i).toggleClass('btn-warning');
                $("#rating-star-"+i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-"+ix).toggleClass('btn-warning');
                $("#rating-star-"+ix).toggleClass('btn-default');
            }
        }));
    });
</script>

