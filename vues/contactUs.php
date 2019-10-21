
<html lang="en">
<?php     require_once('vues/include/headTest.php'); ?>
<body>
<div class="container-fluid space100">
    <div class="row">
        <div class="col-md-2"></div>
        <section class="col-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class=" shadow-lg p-3 mb-5 bg-white rounded col-md-12 col-lg-10 ">
                        <div class="container space100 col-md-12 color2">
                            <div class="justify-content-center">
                                <div class="col-md-12 font2">
                                    <form id="my_form" onsubmit="submitForm(); return false;">
                                        <h3 class="fontGrand2 color2 space100" >Envoyez un message à notre équipe</h3>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="name" class="h4">Nom</label>
                                                <input id="n" class="form-control" placeholder="Écrivez votre nom" required>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="email" class="h4">Courriel</label>
                                                <input id="e" class="form-control" placeholder="Écrivez votre adresse email" type="email" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message" class="h4 ">Message</label>
                                            <textarea id="m"  class="form-control" placeholder="Écrivez votre message ici..." rows="10" required></textarea>
                                        </div>
                                        <input id="mybtn" class="btn btn-success btn-lg pull-right " type="submit" value="Envoyer"> <span id="status"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </section>
        <div class="col-md-2"></div>

    </div>
</div>

</body>
<?php     require_once('vues/include/footer.php'); ?>
</html>