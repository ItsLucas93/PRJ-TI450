<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    if ($user_data != false) {
        header("Location: index.php");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_username = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        //echo($user_username. " " . $user_email . " " . $user_password . " | " . !empty($user_username) . " " . !empty($user_password) . " " . (!is_numeric($user_username)));

        if(!empty($user_username) && !empty($user_password) && (!is_numeric($user_username)))
        {
            //save to database
            $user_id = random_num($con, 20);
            //echo($user_username. " " . $user_email . " " . $user_password . " " . $user_id);
            $query = "INSERT INTO user (user_id, user_username, user_email, user_password) VALUES ('$user_id', '$user_username', '$user_email', '$user_password')";

            $result = mysqli_query($con, $query);
            if (!$result) {
                $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: red; text-align: center; padding: 2px; width: 100vw;"><b>Identifiant déjà existant</b>. Veuillez réessayer.</p>';
                header("Location: signup.php");
            } else {
                $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: green; text-align: center; padding: 2px; width: 100vw;"><b>Inscription terminée</b>. Veuillez vous connecter.</p>';

                // Mail de confirmation
                $name = $user_username;
                $email = $user_email;

                $to = $email . ', lucas@luxas.web-edu.fr';
                $subject = "Confirmation d'inscription : S.BUDGET - " . $name;
                $message = "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Confirmation d'inscription</title><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><style>body{font-family:'Playfair Display',sans-serif;}section{padding:5px;background-color:#f2f2f2;}nav{background-color:#333;color:#fff;display:flex;justify-content:space-between;align-items:center;padding:0 20px;}.nav-logo img{height:50px;}.nav-logo,.nav-right{flex:0 0 200px;}.dummy-nav-item{flex:0 0 200px;background-image:image();}nav ul{margin:0;padding:0;list-style-type:none;display:flex;justify-content:center;flex-grow:1;}nav li{display:inline-block;margin-right:20px;}nav a{display:block;padding:10px;color:#fff;text-decoration:none;}footer{background-color:#333;padding:20px;color:#fff;text-align:center;clear:both;}footer p{margin-bottom:10px;}.social-media-icons{margin-top:10px;}.social-media-icons i{margin-right:10px;color:#fff;font-size:20px;}}</style></head><body><header><nav><div class='nav-logo'><a href='index.php'>S.Budget</a></div><div class='nav-right'><a href='https://luxas.web-edu.fr/login.php'>Connexion</a></div></nav></header><section><h1>Confirmation d'inscription</h1><p>Vous vous êtes inscrit avec succès sur notre site S.Budget. Commencez dès maintenant par compléter votre <a href='https://luxas.web-edu.fr/profile.php'>profil</a>.</p></section><footer><p>Suivez-nous sur les réseaux :</p><div class='social-media-icons'><a href='https://www.facebook.com/EfreiParis/?locale=fr_FR' target='_blank'><i class='fab fa-facebook-f'></i></a><a href='https://twitter.com/Efrei_Paris' target='_blank'><i class='fab fa-twitter'></i></a><a href='https://www.instagram.com/efrei_paris' target='_blank'><i class='fab fa-instagram'></i></a></div><p>&copy; 2023 S.Budget - <a href='https://github.com/ItsLucas93' target='_blank' style='color: inherit; text-decoration: underline; text-decoration-color: white;'>Tous droits réservés</a>.</p></footer></body></html>";
                $headers = 'From: ' . 'lucas@luxas.web-edu.fr' . "\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= "Content-Transfer-Encoding: 8bit\r\n";

                mail($to, $subject, $message, $headers);

                header("Location: login.php");
            }
            die;
        } else {
            $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: red; text-align: center; padding: 2px; width: 100vw;">Informations non valides. Veuillez réessayer.</p>';
            header("Location: signup.php");
            die;
        }
    }

?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>S.BUDGET - Signup</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="media/favicon.ico" sizes="32x32">

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
            <li><a href="contact.php">Contact</a></li>
            <li><a href="about.php">À propos</a></li>
        </ul>
        <div class="dummy-nav-item"></div>
        <div class="nav-right">
            <a href="login.php">Connexion / <span class="current">Inscription</span></a>
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

	<section id="form">
		<h2>Inscrivez vous:</h2>
		<form method="post">
			<h2>Créez votre compte:</h2>

            <label for="username"><b>Identifiant</b></label>
            <input type="text" name="username" id="username" placeholder="Entrez votre identifiant" required>

            <label for="email"><b>E-mail</b></label>
            <input type="email" name="email" id="email" placeholder="Entrez votre email" required>

            <label for="password"><b>Mot de passe</b></label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>

            <label for="confirm_password"><b>Confirmez le mot de passe</b></label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez votre mot de passe" required>

            <br>
            <input class="btn" type="submit" value="S'inscrire">
		</form>
		<p>Vous avez déjà un compte ? <a href="login.php">Connectez vous ici</a></p>
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

<script>
    function checkPassword() {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;

        if (password !== confirm_password) {
            alert("Les mots de passe ne correspondent pas.");
            return false;
        }

        return true;
    }
</script>