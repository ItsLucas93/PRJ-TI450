<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);


// Send mail when you create an account or send message in contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = $email . ', lucas@luxas.web-edu.fr';
    $subject = 'Contact : S.BUDGET - ' . $name;
    $message = "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Confirmation d'inscription</title><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><style>body{font-family:'Playfair Display',sans-serif;}section{padding:5px;background-color:#f2f2f2;}nav{background-color:#333;color:#fff;display:flex;justify-content:space-between;align-items:center;padding:0 20px;}.nav-logo img{height:50px;}.nav-logo,.nav-right{flex:0 0 200px;}.dummy-nav-item{flex:0 0 200px;background-image:image();}nav ul{margin:0;padding:0;list-style-type:none;display:flex;justify-content:center;flex-grow:1;}nav li{display:inline-block;margin-right:20px;}nav a{display:block;padding:10px;color:#fff;text-decoration:none;}footer{background-color:#333;padding:20px;color:#fff;text-align:center;clear:both;}footer p{margin-bottom:10px;}.social-media-icons{margin-top:10px;}.social-media-icons i{margin-right:10px;color:#fff;font-size:20px;}}</style></head><body><header><nav><div class='nav-logo'><a href='index.php'>S.Budget</a></div><div class='nav-right'><a href='https://luxas.web-edu.fr/login.php'>Connexion</a></div></nav></header><section><h1>Confirmation de contact</h1><p>Bonjour " . $name . "<br>Nous vous confirmons la prise en compte de votre message : <br><i> " . $message . " </i></p></section><footer><p>Suivez-nous sur les réseaux :</p><div class='social-media-icons'><a href='https://www.facebook.com/EfreiParis/?locale=fr_FR' target='_blank'><i class='fab fa-facebook-f'></i></a><a href='https://twitter.com/Efrei_Paris' target='_blank'><i class='fab fa-twitter'></i></a><a href='https://www.instagram.com/efrei_paris' target='_blank'><i class='fab fa-instagram'></i></a></div><p>&copy; 2023 S.Budget - <a href='https://github.com/ItsLucas93' target='_blank' style='color: inherit; text-decoration: underline; text-decoration-color: white;'>Tous droits réservés</a>.</p></footer></body></html>";
    $headers = 'From: ' . 'lucas@luxas.web-edu.fr' . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";


    // send email
    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['message'] = '<p style="color: green; text-align: center; padding: 2px; width: 100vw;"><b>Message envoyé avec succès</b>. Vous trouverez une copie dans votre boîte mail.</p>';
    } else {
        $_SESSION['message'] = "<p style='color: red; text-align: center; padding: 2px; width: 100vw;'>Echec de l'envoi. Veuillez réessayer.</p>";
    }
    header("Location: contact.php");
    die;
}


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

<?php

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = '';
}

echo $message;

?>

<section id="contact">
    <h1>Contactez-nous</h1>
    <p>N'hésitez pas à nous contacter pour toute question, suggestion ou demande d'assistance. Nous sommes là pour vous aider.</p>

    <form method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php if(isset($user_data['user_username'])) echo $user_data['user_username']?>" required>

        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" value="<?php if(isset($user_data['user_username'])) echo $user_data['user_email']?>" required>

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