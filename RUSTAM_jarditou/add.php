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

    <?php
    if (isset($_SESSION['message'])) : ?>

        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

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

        <?php
        // if (isset($_GET['mod_id'])) {
        //     $mod_id = $_GET['mod_id'];
        // }
        // else if (isset($_POST['id'])) {
        //     $mod_id = $_POST['id'];
        // }   
        
        ?>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'jarditou') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM produits JOIN categories ON categories.cat_id=produits.pro_cat_id") or die($mysqli->error);
        $row = $result->fetch_assoc();
        // var_dump($result);
        // var_dump($row);
        var_dump($_POST);
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

            <div hidden class="form-group">
                <label>ID :</label>
                <input class="form-control" type="text" value="<?php echo (isset($_POST['id'])) ? $_POST['id'] : '' ; ?>" id="pro_id" name="id">
            </div>

            <div class="form-group">
                <label>Référence :</label>
                <input class="form-control" type="text" value="<?php echo (isset($_POST['ref'])) ? $_POST['ref'] : '' ;?>" id="pro_ref" name="ref">
            </div>

            <div class="form-group">
                <label>Catégorie :</label>
                <select class="form-control" name="cat" id="cat_nom" value="<?php echo (isset($_POST['cat'])) ? $_POST['cat'] : '' ;?>">
                <option>Veuillez séléctionner une catégorie</option>  
                <?php
                    $result_cat = mysqli_query($mysqli, "SELECT cat_nom, cat_id FROM categories");

                    while ($row_cat = mysqli_fetch_assoc($result_cat)) { ?>
                        <option value='<?= $row_cat['cat_id']; ?>'><?= $row_cat['cat_nom']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Libellé :</label>
                <input class="form-control" type="text" value="<?php echo (isset($_POST['lib'])) ? $_POST['lib'] : '' ;?>" id="pro_libelle" name="lib">
            </div>

            <div class="form-group">
                <label>Description :</label>
                <textarea rows="3" class="form-control" value="<?php echo (isset($_POST['description'])) ? $_POST['description'] : '' ;?>" id="pro_description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Prix :</label>
                <input class="form-control" type="number" value="<?php echo (isset($_POST['prix'])) ? $_POST['prix'] : '' ;?>" id="pro_prix" name="prix">
            </div>

            <div class="form-group">
                <label>Stock :</label>
                <input class="form-control" type="number" value="<?php echo (isset($_POST['stock'])) ? $_POST['stock'] : '' ;?>" id="pro_stock" name="stock">
            </div>

            <div class="form-group">
                <label>Couleur :</label>
                <input class="form-control" type="text" value="<?php echo (isset($_POST['coul'])) ? $_POST['coul'] : '' ;?>" id="pro_couleur" name="coul">
            </div>
            
            <div class="form-group">
                <label>Image :</label>
                <input type="file" name="file"></input>
            </div>

            <p>Produit bloqué? :</p>
            <div class="form-group">
                <div class="custom-control custom-radio custom-control-inline">
                    <?php
                        // $block = (isset($_POST["custom"])) ? $_POST["custom"] : $row['pro_bloque'];
                    ?>
                    <input type="radio" id="pro_bloque_1" name="custom" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="pro_bloque_1">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="pro_bloque_2" name="custom" class="custom-control-input" value="0">
                    <label class="custom-control-label" for="pro_bloque_2">Non</label>
                </div>
            </div>

            <div hidden class="form-group">
                <label for="inputDate">Date d'ajout :</label>
                <input type="date" class="form-control" id="pro_d_ajout" value="" name="date_ad">
            </div>

            <!-- <div class="form-group">
                <label for="inputDate">Date de modification :</label>
                <input type="date" class="form-control" id="pro_d_modif" disabled value="" name="date_mod">
            </div> -->

            <div class="justify-content-between">
                <button id="button" class="btn btn-secondary btn-lg" href="tableau.php">Retour</button>
                <button id="button" class="btn btn-success btn-lg" type="submit" name="save">Ajouter</button>
            </div>
        </form><br>

<?php
    include_once 'footer.php';
?>