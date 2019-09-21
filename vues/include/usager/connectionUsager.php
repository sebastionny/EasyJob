<?php
require_once ('./modele/CompteDAO.class.php');
$userDAO = new CompteDAO();
$txt = 'hols';
$user = $userDAO->find("tallernait@gmail.com");
?>

<h3 class="color1 font2 col-sm-12">Se connecter comme</h3>
<div class="container h-100">
		<div class="justify-content-center h-100">
			<div class="user_card rounded-lg">
				<div class="justify-content-center form_container p-4 ">

                    <?php
                    $user = "";
                    if (ISSET($_REQUEST["username"]))
                        $user = $_REQUEST["username"];
                    ?>

                    <form action="" method="post">
                            <div class="form-group input-group">
                                <?php if (ISSET($_REQUEST["field_messages"]["username"]))
                                    echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
                                ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                 </div>
                                <input  class="form-control" placeholder="mery84@gmail.com" type="email" autocomplete="off"
                                        name="username" value="<?=$user?>">
                            </div> <!-- form-group// -->

                            <div class="form-group input-group">
                                <?php if (ISSET($_REQUEST["field_messages"]["password"]))
                                    echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
                                ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input class="form-control" placeholder="Entrer le mot de passe" type="password" autocomplete="off"
                                        name="password" >
                            </div> <!-- form-group// -->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <a href class=""> Créer un compte  </a>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="hidden" name="action" value="connecter" >
                                        <button type="submit" class="btn btn-primary btn-block" value = "OK"> Suivant  </button>
                                    </div>
                                </div>
                            </div> <!-- form-group// -->
                    </form>

                    <?php var_dump($user); ?>

                </div>
            </div>
        </div>
</div>
<div class="col-sm-12 space30">
    <a href><h6 class="color1">Nous joindre</h6> </a>
</div>