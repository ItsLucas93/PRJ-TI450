<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <title>S_Budget - S'inscrire/Se connecter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="media/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-logo">
            <a href="index.php"><img src="media/logo_Header_1100x400.png" alt="Logo"></a>
        </div>
        <div class="dummy-nav-item"></div>
        <ul>
            <li class="current"><a href="index.php">Accueil</a></li>
            <li><a href="yourbudget.php">Votre Budget</a></li>
            <li><a href="about.php">À propos</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="dummy-nav-item"></div>
        <div class="nav-right">
            <a href="login.php">Connexion / Inscription</a>
        </div>
    </nav>
</header>

<section1 class="container_1">
    <div class="gallery-wrapper">
        <figure class="gallery-item">
            <a href="login.php">
                <img src="media/Connexion-1.png" alt="" class="item-image"/>
            </a>
        </figure>

        <figure class="gallery-item">
            <a href="signup.html">
                <img src="media/Inscription-1.png" alt="" class="item-image"/>
            </a>
        </figure>
    </div>

    <footer>

        <p>Suivez-nous sur les réseaux :</p>
        <div class="social-media-icons">
            <a href="https://www.facebook.com/EfreiParis/?locale=fr_FR" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/Efrei_Paris" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/efrei_paris" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>


        <p>&copy; 2023 S_Budget - <a href="https://github.com/ItsLucas93" target="_blank" style="color: inherit; text-decoration: underline; text-decoration-color: white;">Tous droits réservés</a>.</p>
    </footer>
</body>
</html>