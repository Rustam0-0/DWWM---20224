<?php
    session_start();
    include("login/connection.php");
    include("login/functions.php");
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
            <img src="img/jarditou_logo.jpg" width="150" height="50" alt="">
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
                        <li class="nav-item"><a class="nav-link" href="index.php"> Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="tableau.php"> Tableau</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact.php"> Contact</a></li>
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

    <h1>Vos coordonnées</h1>

    <form action="" method="POST">

        <div class="form-group">
            <label for="inputNom">Nom*</label>
            <input type="text" class="form-control" id="inputNom" name="nom" placeholder="Veuillez saisir votre nom" >
        </div>

        <div class="form-group">
            <label for="inputPrénom">Prénom*</label>
            <input type="text" class="form-control" id="inputPrénom" name="prenom" placeholder="Veuillez saisir votre prénom">
        </div>

        <p>
            Sexe*</p>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="Radio1" name="custom"  value="w" class="custom-control-input">
                <label class="custom-control-label" for="Radio1">Féminin</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="Radio2" name="custom" value="m" class="custom-control-input">
                <label class="custom-control-label" for="Radio2">Masculin</label>
            </div>
            <!-- <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="Radio3" name="custom" value="n" class="custom-control-input">
                <label class="custom-control-label" for="Radio3">Neutre</label>
            </div> -->
        </div>

        <div class="form-group">
            <label for="inputDate">Date de Naissance*</label>
            <input type="date" class="form-control" id="inputDate">
        </div>

        <div class="form-group">
            <label for="inputCode">Code Postal*</label>
            <input type="text" class="form-control" placeholder="cinq chiffres" id="inputCode" pattern="[0-9]{5}">
        </div>

        <div class="form-group">
            <label for="inputAddress">Adresse</label>
            <input type="text" class="form-control" id="inputAddress">
        </div>

        <div class="form-group">
            <label for="inputCity">Ville</label>
            <input type="text" class="form-control" id="inputCity">
        </div>

        <div class="form-group">
            <label for="inputEmail">Email*</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="dave.loper@afpa.fr">
        </div>
        <h1>Votre demande</h1>
        <div class="form-group">
            <label for="inputSubj">Sujet*</label>
            <select id="inputSubj" class="form-control">
                <option selected>Veuillez séléctionner un sujet</option>
                <option>...</option>
            </select>
        </div>

        <div class="form-group">
            <label for="question">Votre question* :</label>
            <textarea rows="3" class="form-control" id="question"></textarea>
        </div>

        <div class="form-group">
            <input type="checkbox" name="accepte" value="accepte">*J'accepte le traitement informatique de ce formulaire
        </div>

        <div class="justify-content-between">
            <button type="submit" class="btn btn-dark" value="send">Envoyer</button>
            <button type="reset" class="btn btn-dark">Annuler</button>
            <div class="col-lg-4 col-sm-12" style="background-color: rgb(250, 178, 9)"><?php require_once 'script.php'; ?></div>
            
        </div>


    </form><br>

<?php
    include_once 'footer.php';
?>