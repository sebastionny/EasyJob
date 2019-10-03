<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2559a64823.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./img/favicon.png" sizes="32x32">
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <link href="./css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>EasyJob, Plateforme pour trouver un employé de dernière minute</title>


</head>
<body>

<div class="container-fluid">
    <div class="row">

        <header>
                <?php
                if (!ISSET($_SESSION)) session_start();
                if (ISSET($_SESSION["connected"])) {
                    if (!$_SESSION["connected"]) {
                        ?>
<!--            fixed-top-->
            <nav class="navbar fixed-top   navbar-expand-lg  navbar-light ">
                <a class="navbar-brand" href="?">
                    <img src="./img/logo.jpg"  width = "200px " class="d-inline-block align-top img-fluid" alt="Logotype EasyJob"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                            <a class="nav-link btn btn-primary btn-lg" href="?action=singInResto"> M'inscrire comme restaurant </a>
                            <a class="nav-link btn btn-primary  btn-lg btn-line" href="?action=singInEmploye">M'inscrire comme Employé</a>
                            <a class="nav-link btn login" href="?action=connecter" ">ME CONNECTER</a>
                        </div>
                        <?php
                    } else {

                        if($_SESSION['infoCompte']->getEstEmploye() == 0){ ?>
                            <nav class="navbar  fixed-top  navbar-expand-lg  navbar-light ">
                                <a class="navbar-brand" href="?">
                                    <img src="./img/logo.jpg"  width = "200px " class="d-inline-block align-top img-fluid" alt="Logotype EasyJob"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                                            <a class="nav-link btn login activeLine" href="?action=demandeService"> Demander un service <?= $_SESSION["connected"]; ?>  </a>
                                            <a class="nav-link btn login" href="?action=profilResto"> Mon Profil <?= $_SESSION["connected"]; ?>  </a>
                                            <a class="nav-link btn login"  href="?action=logout">Me déconnecter</a>
                                        </div>
                        <?php }else{ ?>
                            <nav class="navbar  fixed-top  navbar-expand-lg  navbar-light ">
                                <a class="navbar-brand" href="?">
                                    <img src="./img/logo.jpg"  width = "200px " class="d-inline-block align-top img-fluid" alt="Logotype EasyJob"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                                        <a class="nav-link btn login" href="?action=profilEmploye"> Mon Profil <?= $_SESSION["connected"]; ?>  </a>
                                            <a class="nav-link btn login"  href="?action=logout">Me déconnecter</a>
                                        </div>
                            
                        <?php }
                    }
                }
                else {
                    ?>
            <nav class="navbar fixed-top  navbar-expand-lg  navbar-light ">
                <a class="navbar-brand" href="?">
                    <img src="./img/logo.jpg"  width = "200px " class="d-inline-block align-top img-fluid" alt="Logotype EasyJob"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                        <a class="nav-link btn btn-primary btn-lg" href="?action=singInResto"> M'inscrire comme restaurant </a>
                        <a class="nav-link btn btn-primary  btn-lg btn-line" href="?action=singInEmploye">M'inscrire comme Employé</a>
                        <a class="nav-link btn login" href="?action=connecter" ">ME CONNECTER</a>
                    </div>
                    <?php
                }
                ?>
            </nav>
        </header>


