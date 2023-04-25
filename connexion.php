<?php
session_start();
require("bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinetech</title>
</head>

<body>
    <?php
    require("header.php");
    ?>
    <main>
        <form action="" method="post">
            <input type="text" name="login" id="" placeholder="Login">
            <input type="email" name="email" id="" placeholder="Email">
            <input type="password" name="password" id="" placeholder="Password">
            <button type="submit" name="connexion">Se connecter</button>
        </form>
    </main>
</body>
<?php
if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connectUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND email = ? AND password = ?");
    $connectUser->execute([$login, $email, $password]);

    if ($connectUser->rowCount() == 0) { ?>
        <script>
            alert("votre login, email ou password est incorrect");
        </script>
<?php
    } else {
        $connectUser = $connectUser->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION = $connectUser[0];
        header("Location: index.php");
    }
}
var_dump($_SESSION);
?>

<script src="./js/validConnexion.js"></script>

</html>