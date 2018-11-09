<?php
/**
 * Created by PhpStorm.
 * User: kalidou
 * Date: 09/10/2018
 * Time: 10:41
 */
include('filtrage/guets_filter.php');
if (isset($_POST['connexion'])){
    $error = "";
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty(['username','password'])){
        if($username == "kalidou-papa" && $password == "kalidou-papa"){
            $temps = 24*3600;
            $options = [
                'cost' => 11,
            ];
            setcookie ("username", password_hash($username,PASSWORD_DEFAULT,$options), time() + $temps);
            setcookie ("password", password_hash($password,PASSWORD_DEFAULT,$options), time() + $temps);
            header('location: explorateur.php');
        } else {
            header('location: index.php');
        }
    } else {
        header('location: index.php');
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <div class="title"><h1>Authentification</h1></div>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="formBox">
                <form action="" method="post">
                    <p>Identifiant</p>
                    <input type="text" name="username" placeholder="mon_identifiant">
                    <p>Mot de passe</p>
                    <input type="password" name=password placeholder="*********">
                    <input type="submit" name="connexion" id="connexion" value="Se Connecter">
                </form>
            </div>
        </div>
    </div>
</body>
</html>