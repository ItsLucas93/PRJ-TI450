<?php
session_start();

include("conncetion.php");
include("functions.php");

$user_data = check_login($con);

if (!isset($user_data['user_username'])) {
    $_SESSION['message'] = '<p style="color: red; text-align: center; padding: 2px; width: 100vw;">Pour accéder à <b>Vos bon plans</b>, veuillez vous connecter !</p>';
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <title>S.BUDGET - Votre Budget</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/favicon.ico" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/deals.css">

    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<header>
    <nav>
        <div class="nav-logo">
            <a href="index.php"><img src="media/logo_Header_1100x400.png" alt="Logo"></a>
        </div>
        <div class="dummy-nav-item"></div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="yourbudget.php">Votre Budget</a></li>
            <li class="current"><a href="yourdeals.php">Vos bon plans</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">À propos</a></li>
        </ul>
        <div class="dummy-nav-item"></div>
        <div class="nav-right">
            <?php if(!isset($user_data['user_username'])) echo '<a href="login.php">Connexion / Inscription</a>' ?>
            <?php if(isset($user_data['user_username'])) {echo '<div class="dropdown"><button class="dropbtn"> Utilisateur : '. $user_data['user_username'] . '</button><div class="dropdown-content"><a href="profile.php">Votre Profil</a><a href="logout.php">Déconnexion</a></div></div>';} ?>
        </div>
    </nav>
</header>

<section>
    <div class="events">
        <img class="leftimg" src="media/transport.png" alt="event1">
        <div class="righttext">
            <h4>Catégorie</h4>
            <h2>Nom du bon plan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec volutpat lacus. Praesent condimentum mauris vel massa consectetur, ac porta lorem aliquet.</p>
        </div>
    </div>

    <div class="events">
        <div class="lefttext">
            <h4>Catégorie</h4>
            <h2>Nom du bon plan</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec volutpat lacus. Praesent condimentum mauris vel massa consectetur, ac porta lorem aliquet.</p>
        </div>
        <img class="rightimg" src="media/transport.png" alt="event1">
    </div>
</section>


<footer>
    <p>Suivez-nous sur les réseaux :</p>
    <div class="social-media-icons">
        <a href="https://www.facebook.com/EfreiParis/?locale=fr_FR" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/Efrei_Paris" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/efrei_paris" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>

    <p>&copy; 2023 S.Budget - <a href="https://github.com/ItsLucas93" target="_blank" style="color: inherit; text-decoration: underline; text-decoration-color: white;">Tous droits réservés</a>.</p>
</footer>
</body>
</html>