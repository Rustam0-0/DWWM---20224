<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        .pic {
            text-align: center;
        }
        #button{
            width: 10%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>page référence</title>
</head>

<body>
    <?php require_once 'script.php'; ?>

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
                        <!-- <li class="nav-item"><a class="nav-link" href="contact.php"> Contact</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="login/logout.php"> Log out</a></li>
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
        </div><br><br>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <?php  ?>

            <?php
            $test = $_GET['del_id'];
            $mysqli = new mysqli('localhost', 'root', '', 'jarditou') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM produits WHERE pro_id = $test") or die($mysqli->error);
            ?>
            <?php $row = $result->fetch_assoc() ?>

            <input class="form-control" type="text" hidden value="<?php echo $_GET['del_id']; ?>" id="pro_id" name="id">

            <p class="pic"><img src="img/<?php echo $row['pro_id']; ?>.<?php $fileActualExt?>" width="200" height="200" alt="<?php echo $row['pro_id']; ?>.jpg"></p>

            <div class="py-5"><h1 align="center"><?php echo $row['pro_ref']; ?></h1></div>

            <div class="pb-5"><h2 align="center">Ëtes vous sûr de vouloir supprimer "<?php echo $row['pro_ref']; ?>" de la basse de données?</h2></div>

            <div class="justify-content-between">
                <button class="btn btn-danger btn-lg" id="button" type="submit" name="delete">Supprimer</button>
                <a class="btn btn-success btn-lg" id="button" href="tableau.php">Annuler</a>
            </div>
        </form><br>

<?php
    include_once 'footer.php';
?>