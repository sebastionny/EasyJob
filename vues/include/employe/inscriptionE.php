 <h3 class="color1">Créer votre compte</h3> 
                    <h4 class="color1">Je veux travailler dans la restauration</h4> 
<?php  if (ISSET($_REQUEST["global_message"]))
    $msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
    $n ="";
	$p="";
	$e ="";
	$mp="";
	$mp1="";
    if (ISSET($_REQUEST["nom"]))
    $n = $_REQUEST["nom"];

 if (ISSET($_REQUEST["prenom"]))
    $p = $_REQUEST["prenom"];
 if (ISSET($_REQUEST["email"]))
    $e = $_REQUEST["email"];

 if (ISSET($_REQUEST["motPasse"]))
    $mp = $_REQUEST["motPasse"];
if (ISSET($_REQUEST["motPasse1"]))
    $mp1 = $_REQUEST["motPasse1"];
?>					
    <!--Formulaire-->
<form action="" method="post">
<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom" class="form-control" type="text" placeholder="Votre Nom" value="<?php echo $n?>"/><br/>
            <?php if (ISSET($_REQUEST["field_messages"]["nom"]))
                echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["nom"]."</span>";
            ?><br/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="prenom" class="form-control" placeholder="Votre prénom" value="<?php echo $p?>" type="text">
		   <?php if (ISSET($_REQUEST["field_messages"]["prenom"]))
                echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["prenom"]."</span>";
            ?><br/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="mery84@gmail.com" value="<?php echo $e?>" type="email">
		   <?php if (ISSET($_REQUEST["field_messages"]["email"]))
                echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["email"]."</span>";
            ?><br/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="motPasse" class="form-control" placeholder="Créer le mot de passe" value="<?php echo $mp?>"  type="password">
		   <?php if (ISSET($_REQUEST["field_messages"]["motPasse"]))
                echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["motPasse"]."</span>";
            ?><br/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="motPasse1" class="form-control" placeholder="Confirmer le mot de passe" type="password" value="<?php echo $mp1?>">
		 <?php if (ISSET($_REQUEST["field_messages"]["motPasse1"]))
                echo "<br/><span class=\"warningMessage\">".$_REQUEST["field_messages"]["motPasse1"]."</span>";
            ?><br/>
    </div> <!-- form-group// --> 
    <div class="form-group">
	<input name="action" value="singInEmploye" type="hidden" />
        <button type="submit" class="btn btn-primary btn-lg font1"> Suivant  </button>
    </div> <!-- form-group// -->   
</form>