<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>S_Budget - Contact</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="media/favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
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
                <li><a href="yourbudget.html">Votre Budget</a></li>
                <li><a href="about.html">À propos</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <div class="dummy-nav-item"></div>
            <div class="nav-right">
                <a href="loginsignup.html">Connexion / Inscription</a>
            </div>
		</nav>
	</header>

    <section id="contact">
        <h1>Contactez-nous</h1>
        <p>N'hésitez pas à nous contacter pour toute question, suggestion ou demande d'assistance. Nous sommes là pour vous aider.</p>
    
        <form action="envoi-email.php" method="post">
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
        <p>&copy; 2023 S_Budget - Tous droits réservés.</p>
    </footer>

</body>
</html>