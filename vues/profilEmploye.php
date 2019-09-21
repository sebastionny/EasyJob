<?php require_once('./vues/include/headTest.php'); ?>

         <div class="container-fluid space100 ">

         <div class="row">
             <div class="col-md-3">
             <img src="./img/pp.jpg" alt="Profil de ..." class="img-thumbnail profil ">

             <form class="space30 fontCenter">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary ">Changer </button>
            </form>

            <div class="space100 font2 fontGrand3 ">
                <a href="#" class="btn btn-line1 btn-block color1 activeLine"> Mon Profil</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes services</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Mes commentaires</a>
                <a href="#" class="btn btn-line1 btn-block color1"> Me  déconnecter</a>


            </div>   
             </div>

             <section class="col-md-9 lineCote">
                 <div class="container">

                 <?php
                 if (!ISSET($_SESSION)) session_start();
                 if (ISSET($_SESSION["connected"])) {
                     require_once('./vues/include/employe/profil.php');
                 } else
                     echo '<h1>NO HAY SECCION ACTIVA</h1>'?>

                </div>
             </section>

         </div>
         </div>
</div>
         

<?php     require_once('./vues/include/footer.php'); ?>
