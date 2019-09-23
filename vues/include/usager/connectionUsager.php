<h3 class="color1">Se connecter comme</h3> 
<div class="container h-100">

                    <?php
                    if (ISSET($_REQUEST["global_message"]))
                        $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
                    $u = "";
                    if (ISSET($_REQUEST["username"]))
                        $u = $_REQUEST["username"];
                    ?>
                    <form action="" method="post">
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            <input name="username" class="form-control" type="email" value="<?php echo $u ?>">
        </div>
        <div>
        <?php if (ISSET($_REQUEST["field_messages"]["username"]))
            echo "</br><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
        ?>
        </div>
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
            <span for="password" class="input-group-text"> <i class="fa fa-lock"></i> </span>
        <input name="password" class="form-control"  type="password">
        </div>
        <?php if (ISSET($_REQUEST["field_messages"]["password"]))
            echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["password"]."</span>";
        ?>
    </div> <!-- form-group// -->

    <div class="form-group">
        <div class="row">
        <div class="col-md-7">
                <a href class=""> Créer un compte  </a>
            </div>
            <div class="col-md-5">
                <input name="action" value="connecter" type="hidden" />
                <button type="submit" class="btn btn-primary btn-block"> Suivant  </button>
                    </form>
 <!-- form-group// -->



</div> </div> </div> </div><a href><h6 class="color1">Nous joindre</h6> </a>
</div>