<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
    if ($user_data != false) {
        header("Location: index.php");
        die;
    }


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];

        //echo($user_username. " " . $user_email . " " . $user_password . " | " . !empty($user_username) . " " . !empty($user_password) . " " . (!is_numeric($user_username)));

        if(!empty($user_username) && !empty($user_password) && (!is_numeric($user_username)))
        {
            // read to database
            //echo($user_username. " " . $user_email . " " . $user_password . " " . $user_id);
            $query = "SELECT * FROM user WHERE user_username = '$user_username' limit 1";
            $result = mysqli_query($con, $query);
            if ($result)
            {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['user_password'] === $user_password) {
                        $_SESSION['user_id'] = $user_data['user_id'];

                        $query = "SELECT * FROM user_profile WHERE `user_id` = " . $user_data['user_id'];
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);
                        foreach ($row as $column => $value) {
                            if ($value === null) {
                                $_SESSION['message'] = '<p style="color: red; text-align: center; padding: 2px; width: 100vw;">Nous vous conseillions de <b>renseigner votre profile !</b></p>';
                                header("Location: profile.php");
                                die;
                            }
                        }

                        header("Location: index.php");
                        die;
                    }
                    else {
                        // echo "Wrong Password";
                        $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: red; text-align: center; padding: 2px; width: 100vw;">Identifiants non valides. Veuillez réessayer.</p>';
                    }
                }
                else {
                    // echo "Wrong Username";
                    $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: red; text-align: center; padding: 2px; width: 100vw;">Identifiants non valides. Veuillez réessayer.</p>';
                }
            }
        } else {
            // echo "Please enter valid information";
            $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: red; text-align: center; padding: 2px; width: 100vw;">Identifiants non valides. Veuillez réessayer.</p>';
        }
    }

?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>S.BUDGET - Login</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/favicon.ico" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <a href="signup.php"> <span class="current">Connexion</span> / Inscription</a>
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
		<h2>Connectez vous:</h2>
		<form method="post">
			<h2>Connexion:</h2>
            <br>
			<label for="username">Identifiant :</label>
			<input type="text" id="username" name="username" placeholder="Identifiant" required>
            
            <br><br>

			<label for="password">Mot de passe:</label>
			<input type="password" id="password" name="password" placeholder="Mot de passe">
			
            <br><br><br>
            
            <input type="submit" value="Connexion">
		</form>
        <br><br>
		<p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous ici</a></p>
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