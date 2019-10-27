
<div class="container h-100">
    <?php
    if (ISSET($_REQUEST["global_message"]))
        $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
    $u = "";
    if (ISSET($_REQUEST["username"]))
        $u = $_REQUEST["username"];
    ?>
    <form action="" method="post">
        <fieldset>
            <legend class="color1 font2 fontGrand4"> &nbsp;&nbsp;&nbsp;CONNECTEZ VOUS </legend>
<br/>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    <input name="username" class="form-control font2" type="email" value="<?= $u ?>">
                </div>
                <div>
                    <?php if (ISSET($_REQUEST["field_messages"]["username"]))
                        echo "</br><span class=\"warningMessage font2 \">".$_REQUEST["field_messages"]["username"]."</span>";
                    ?>
                </div>
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span for="password" class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    <input name="password" class="form-control font2"  type="password">
                </div>
                <?php if (ISSET($_REQUEST["field_messages"]["password"]))
                    echo "<br /><span class=\"warningMessage font2 \">".$_REQUEST["field_messages"]["password"]."</span>";
                ?>
            </div> <!-- form-group// -->
<br/>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-7">
                        <input name="action" value="connecter" type="hidden" />
                        <button type="submit" class="btn btn-primary font2 btn-block"> SE CONNECTER  </button>
        </fieldset>
    </form>
</div> </div> </div> </div>
</div>