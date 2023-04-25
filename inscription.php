<?php
session_start();
include("bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
</head>

<body><?php
        require("header.php");
        ?>
    <form id="inscription" action="" method="post">
        <input id="login" type="text" name="login" placeholder="Login"><br>
        <input id="email" type="text" name="email" placeholder="Email"><br>
        <input id="password" type="text" name="password" placeholder="Password"><br>
        <input id="confirm_password" type="text" name="confirm_password" placeholder="Confirm the password"><br>
        <button type="submit" name="inscription">S'inscrire</button>
    </form>
</body>

</html>
<?php
if (isset($_POST['inscription'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $insertUser = $bdd->prepare("INSERT INTO utilisateurs(login,email,password)VALUES(?,?,?)");
    $insertUser->execute([$login, $email, $password]);
    header("Location: connexion.php");
}
?>
<script src="./js/validInscription.js"></script>