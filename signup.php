<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_username = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        //echo($user_username. " " . $user_email . " " . $user_password . " | " . !empty($user_username) . " " . !empty($user_password) . " " . (!is_numeric($user_username)));

        if(!empty($user_username) && !empty($user_password) && (!is_numeric($user_username)))
        {
            //save to database
            $user_id = random_num($con,20);
            //echo($user_username. " " . $user_email . " " . $user_password . " " . $user_id);
            $query = "INSERT INTO user (user_id, user_username, user_email, user_password) VALUES ('$user_id', '$user_username', '$user_email', '$user_password')";

            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        } else {
            echo "Please enter valid information";
        }
    }

?>

<!DOCTYPE html>

<html lang="fr">
<head>
	<title>S_Budget - Connexion / Inscription</title>
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

	<section id="form">
		<h2>Inscrivez vous:</h2>
		<form>
			<h2>Créez votre compte:</h2>
			
			<label for="firstname">Identifiant :</label><br>
			<input type="text" id="username" name="username" required><br>
			
            <label for="email">Email :</label><br>
			<input type="email" id="email" name="email" required><br>
			
            <br>

            <label for="password">Mot de passe :</label><br>
			<input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un chiffre, une majuscule, une minuscule et un caractère spécial." required><br>

             <label for="confirm_password"><b>Confirmez le mot de passe</b></label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez votre mot de passe" required>
            <br><br>

            <input type="submit" value="S'inscrire">
		</form>
		<p>Vous avez déjà un compte ? <a href="login.php">Connectez vous ici</a></p>
	</section>
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