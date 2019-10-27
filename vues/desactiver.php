<?php


require_once('vues/include/headTest.php'); ?>

    <div class="container " >
        <div class="row space100">
            <div class="col-md-8 space100 ">
                <h2 class="font1 fontGrand1"> Nous sommes tristes de vous voir partir <i class="fa fa-frown-o" aria-hidden="true"> </i></h2>
                <p class="font2 fontGrand3 color2">  </p>
                <p class="font2 fontGrand3"> Voulez vous vraiment desactiver votre compte ? </p></h2>
                <form action="" onsubmit="mailToEmployer()" >
                    <div class="row">
                        <a class=" col-sm-5 btn btn-lg btn-outline-primary btn-line font1 fontGrand3" href="?action=default" > Non! Je veux rester!</a>
                        <div class="col-sm-2"></div>
                        <input name="sendDesactiver" type="hidden" />
                        <input name="action" value="desativerUser" type="hidden" />
                        <input type="submit" onclick="alert('Un courriel sera envoye a un membre de notre equipe.Votre compte sera desactiver dans les prochains 24 heures. Bye!')" class="col-sm-5 btn btn-lg btn-primary font1 fontGrand3" value="OUI Je veux partir!" />
                        <span class="warningMessage" id="statusMes"></span>

                    </div>
                </form>

            </div >
        </div>
    </div>
    </div> <!-- This DIV closed the container Fluid-->

<?php     require_once('vues/include/footer.php'); ?><?php
