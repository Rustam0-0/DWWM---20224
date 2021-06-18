<?php
    session_start();
    include("login/connection.php");
    include("login/functions.php");

    // $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>page accueil</title>
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <img src="img/jarditou_logo.jpg" width="150" height="50" alt="logo">
            <h1>Tout le jardin</h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <a class="navbar-brand" href="index.php">Jarditou.com</a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"> Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="tableau.php"> Tableau</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"> Contact</a></li>
                        <?php if (!isset($_SESSION['user_id'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="login/login.php"> Espace Admin</a></li>';
                        }else{
                        echo '<li class="nav-item"><a class="nav-link" href="login/logout.php"> Log out</a></li>'; }
                        ?>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="d-flex">
            <img src="img/promotion.jpg" alt="prmotion" class="w-100">
        </div>
    <div class="shadow mb-3 bg-white">
        <div class="d-flex flex-wrap">
            <div class="col-lg-8 col-sm-12">
                <h2>L'entreprise</h2>
                <p>Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
                <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie.</p>

                <h2>Qualité</h2>
                <p>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
                <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>

                <h2>Devis gratuit</h2>
                <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
            </div>
            <div class="col-lg-4 col-sm-12" style="background-color: rgb(250, 178, 9);">[Colonne de droite]</div>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>
