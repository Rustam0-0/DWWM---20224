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
            //read from database
            $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['user_pass'] === $user_pass)
                    {
                        // $_SESSION['user_id'] == true;
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header('location: ../index.php');
                        die;
                    }
                }
            }
            $_SESSION['message'] = "Mauvais nom d'utilisateur ou mot de passe";
            $_SESSION['msg_type'] = "danger";
        }else
        {
            $_SESSION['message'] = "Entrez le nom d'utilisateur et mot de passe";
            $_SESSION['msg_type'] = "danger";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Log in</title>
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
        <h2>Connectez-vous!</h2>
        <form action="" method="POST" class=""><br><br>
            <input id="log_input" type="text" name="user" placeholder="Nom d'utilisateur"><br><br>
            <input id="log_input" type="password" name="pass" placeholder="Mor de passe"><br><br>
            <button id="button" type="submit" name="login">Entrer</button><br><br>
            <a href="singup.php">Vous n'avez pas de compte?</a>
        </form>
    </div>
    <div class="col">
    </div>

</div>
</body>
