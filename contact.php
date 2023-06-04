<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>S.BUDGET - Contact</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/favicon.ico" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
            <li><a href="yourdeals.php">Vos bon plans</a></li>
            <li class="current"><a href="contact.php">Contact</a></li>
            <li><a href="about.php">À propos</a></li>
        </ul>
        <div class="dummy-nav-item"></div>
        <div class="nav-right">
            <?php if(!isset($user_data['user_username'])) echo '<a href="login.php">Connexion / Inscription</a>' ?>
            <?php if(isset($user_data['user_username'])) {echo '<div class="dropdown"><button class="dropbtn"> Utilisateur : '. $user_data['user_username'] . '</button><div class="dropdown-content"><a href="profile.php">Votre Profil</a><a href="logout.php">Déconnexion</a></div></div>';} ?>
        </div>
    </nav>
</header>

<section id="contact">
    <h1>Contactez-nous</h1>
    <p>N'hésitez pas à nous contacter pour toute question, suggestion ou demande d'assistance. Nous sommes là pour vous aider.</p>

    <form action="send_mail.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>

        <br><br>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <br><br>
        <input type="submit" value="Envoyer">
    </form>
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