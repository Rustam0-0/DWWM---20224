<?php
    session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user'];
        $user_pass = $_POST['pass'];

        if(!empty($user_name) && !empty($user_pass) && !is_numeric($user_name))
        {
            //save to database
            $query = "INSERT INTO users (user_name, user_pass) VALUES ('$user_name', '$user_pass')";

            mysqli_query($con, $query);

            header('location: login.php');
            die;
        }
        $_SESSION['message'] = "Créez un nom d'utilisateur et mot de passe";
        $_SESSION['msg_type'] = "danger";

    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Sing up</title>
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
<div class="d-flex justify-content-around px-2 py-5">
    <div class="col">
    </div>
    <div id="field" class="col-3">
        <h2>Créez un compte</h2>
        <form action="" method="POST" class=""><br><br>
            <input id="log_input" type="text" name="user" placeholder="Nom d'utilisateur"><br><br>
            <input id="log_input" type="password" name="pass" placeholder="Mor de passe"><br><br>
            <button id="button" type="submit" name="singup">Créer</button><br><br>
            <a href="login.php">Vous avez déjà un compte?</a>
        </form>
    </div>
    <div class="col">
    </div>

</div>
</body>