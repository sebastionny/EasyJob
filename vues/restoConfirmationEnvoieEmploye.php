
    <?php
      $trouve=23;
    require_once('vues/include/headTest.php'); ?>

        <div class="container " >

                <div class="row space100">
                    <div class="col-md-4">
                        <img class="img-fluid" src="img/couriel2.jpg" />
                    </div>
                     <div class="col-md-8 space100 " >
                        <h4 class="font1 fontGrand2 color2"> Bonjour </h4>
                         <div class="font2 fontGrand4 ">

                            <p> Un courriel avec toutes les informations de votre employé a été envoyé ! </p>
                            <p> Veuillez le contacter dés maintenent  </p>
                            <p> N'oubliez pas que vous pouvez toujours accepter un autre profil </p>
                         </div>
                    </div >
                </div>
                <?php  var_dump($_SESSION['infoService']) ?>
        </div>
    </div> <!-- This DIV closed the container Fluid-->
    <?php     require_once('vues/include/footer.php'); ?>
    