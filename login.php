<?php
session_start();

    include("conncetion.php");
    include("functions.php");

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
                        header("Location: index.php");
                        die;
                    }
                    else {
                        echo "Wrong Password";
                    }
                }
                else {
                    echo "Wrong Username";
                }
            }
        } else {
            echo "Please enter valid information";
        }
    }

?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>Connexion - S_Budget</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="media/favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
                <li><a href="yourbudget.html">Votre Budget</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="dummy-nav-item"></div>
            <div class="nav-right">
                <a href="loginsignup.html">Connexion / Inscription</a>
            </div>
		</nav>
	</header>

	<section id="form">
		<h2>Connectez vous:</h2>
		<form method="post">
			<h2>Connexion:</h2>
            <br>
			<label for="username">Identifiant :</label>
			<input type="username" id="username" name="username" value="Identifiant" required>
            
            <br><br>

			<label for="password">Mot de passe:</label>
			<input type="password" id="password" name="password" value="Mot de passe" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial">
			
            <br><br><br>
            
            <input type="submit" value="Connexion">
		</form>
        <br><br><br><br><br><br><br><br><br><br>
		<p>Vous n'avez pas de compte ? <a href="signup.html">Inscrivez-vous ici</a></p>
	</section>
</body>
</html>