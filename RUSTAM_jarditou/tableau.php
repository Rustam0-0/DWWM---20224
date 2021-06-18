<?php
    session_start();
    // include("login/connection.php");
    // include("login/functions.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>page accueil</title>
    <style>
        .pic {
            text-align: center;
        }
        #link{
            color: red;
        }
        #button{
        width: 100px;
        color: black;
        background-color: lightgreen;
        width: 100%;
        text-align: center;}
    </style>
</head>

<body>
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
                        <li class="nav-item active"><a class="nav-link" href="tableau.php"> Tableau</a></li>
                        <?php if (!isset($_SESSION['user_id'])) :
                            echo '<li class="nav-item"><a class="nav-link" href="contact.php"> Contact</a></li>'; endif;
                        ?>
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

    <?php
    require_once 'script.php';
    
    $mysqli = new mysqli('localhost','root','','jarditou') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM produits") or die($mysqli->error);
    ?>

    <?php
    if(isset($_SESSION['user_id'])) : ?>
        <div>
            <a id="button" class="btn btn-warning btn-lg" href="add.php">Ajouter un produit</a>
        </div>
    <?php endif ?>

    <table class="table table-responsive-sm table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Photo</th>
                <th>ID</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Couleur</th>
                <th>Ajout</th>
                <th>Modif</th>
                <th>Bloqué</th>
            </tr>
        </thead>

        <?php
                while($row = $result->fetch_assoc()): ?>
            <tr>
                <td bgcolor="#FFCC66"><img src="img/<?php echo $row['pro_id']; ?>.<?php $row['pro_photo']; ?>" width="90" height="90" alt="<?php echo $row['pro_id']; ?>.<?php $fileActualExt; ?>" /></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_id']; ?></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_ref']; ?></td>
                <td bgcolor="#FFCC66"><a id="link" class="link" href="reference.php?id=<?php echo $row['pro_id']?>"><?php echo $row['pro_libelle']; ?></a></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_prix']; ?></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_stock']; ?></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_couleur']; ?></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_d_ajout']; ?></td>
                <td bgcolor="#CCCCFF"><?php echo $row['pro_d_modif']; ?></td>
                <td bgcolor="#CCCCFF"><?php if ($row['pro_bloque'] == '1') : echo 'BLOQUE'; endif; ?></td>                   
            </tr>
        <?php endwhile; ?>
        
    </table>

<?php
    include_once 'footer.php';
?>