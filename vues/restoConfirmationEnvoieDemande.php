<?php
      $trouve=23;
    require_once('vues/include/headTest.php'); ?>

	 <div class="container " >
	    <div class="row space100">
            <div class="col-md-4">
                <img src="img/cherche.jpg" style="height:  400px"/>
            </div>
             <div class="col-md-8 space100 ">
                <h2 class="font1 fontGrand1">  On a Trouve </h2>
                <p class="font2 fontGrand3 color2"> <?php echo $trouve;?> Serveurs(ses) </p>
                <p class="font2 fontGrand3"> Voulez Vous Envoyer Votre Offre de Service ? </p></h2>
                 <div class="row">
                     <a class=" col-sm-5 btn btn-lg btn-outline-primary btn-line font1 fontGrand3" href="#" > Modifier la Recherche</a>
                     <div class="col-sm-2"></div>
                     <a class=" col-sm-5 btn btn-lg btn-primary font1 fontGrand3" href="#"> OUI Envoyer a Tous</a>
                 </div>

            </div >
		</div>
	</div>
</div> <!-- This DIV closed the container Fluid-->

<?php     require_once('vues/include/footer.php'); ?>
    