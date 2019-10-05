
<?php require_once('vues/include/headTest.php');
$nom="Amelia";
$nbreEtoile=4;
?>
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
                <a href="#" class="btn btn-line1 btn-block color1"> Mon Profil</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes services</a>
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Mes employés</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>
            </div>
        </div>
        <section class="col-md-9 lineCote">
            <div class="container">
                <div class="col space30 pb-3">
                    <h3 class="font1 fontGrand1 color2">Évaluez votre service</h3>
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

                            </div>
                        </div>
                    </div>


                </div>


                <div class="col-md-11 space30 form-group shadow-textarea font2">
                        <label class="fontGrand3 pt-2">Comment s'est passé le service réalisé par <span class="font1 color2"> Assia ? </span></label>
                        <span id="rateMe2"  class="empty-stars"></span>
                    <div class="form-group row">
                        <label class="control-label" >
                            <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                        </label>

                        <div class="form-group" id="rating-ability-wrapper">

                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </button>
                        </div>

                        <h3 class="bold rating-header">
                            <span class="selected-rating">0</span><small> / 5</small>
                        </h3>

                    </div>
                        <textarea class="form-control z-depth-1 font2 space30" id="exampleFormControlTextarea345" rows="4" placeholder="Écrivez votre commentaire..."></textarea>                        </div>


                    <div class="col-md-12 ">
                        <button type="submit" class="nav-link btn btn-primary font1 ">ENVOYER</button>
                    </div>
                </div>
        </section>

    </div>
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

<?php     require_once('vues/include/footer.php'); ?>
