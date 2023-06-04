<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if (!isset($user_data['user_username'])) {
        $_SESSION['message'] = '<p style="color: red; text-align: center; padding: 2px; width: 100vw;">Pour accéder à <b>Votre budget</b>, veuillez vous connecter !</p>';
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


    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/script.js"></script>
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
            <li class="current"><a href="yourbudget.php">Votre Budget</a></li>
            <li><a href="yourdeals.php">Vos bon plans</a></li>
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


<div class="container_2">
    <div class="left">
        <section id="form">
            <h2>Entrez vos dépenses mensuelles</h2>
            <form method="post" onsubmit="recup_depenses(event);" id="myForm">

                <label for="loyer">Loyer :</label>
                <input type="number" id="loyer" name="loyer" required><br>

                <label for="services_publics">Services publics :</label>
                <input type="number" id="services_publics" name="services_publics" required><br>

                <label for="alimentation">Alimentation :</label>
                <input type="number" id="alimentation" name="alimentation" required><br>

                <label for="hygiene">Hygiène :</label>
                <input type="number" id="hygiene" name="hygiene" required><br>

                <label for="abonnements">Abonnement(s) :</label>
                <input type="number" id="abonnements" name="abonnements" required><br>

                <label for="assurances">Assurance(s) :</label>
                <input type="number" id="assurances" name="assurances" required><br>

                <label for="transport">Transport(s) :</label>
                <input type="number" id="transport" name="transport" required><br>

                <label for="divertissement">Divertissement :</label>
                <input type="number" id="divertissement" name="divertissement" required><br>

                <label for="autre_depenses">Autre dépenses :</label>
                <input type="number" id="autre_depenses" name="autre_depenses" required><br>

                <input type="submit" value="Calculer" id="calculer_depenses">
            </form>
            <p id="totalDepenses"></p>
        </section>
        <canvas id="depensesChart"></canvas>

    </div>

    <div class="right">
        <section id="form">
            <h2>Entrez vos revenus mensuels</h2>
            <form method="post" onsubmit="recup_revenus(event);">

                <label for="salaire">Salaire net :</label>
                <input type="number" id="salaire" name="salaire" required><br>

                <label for="aides_sociales">Aides sociales :</label>
                <input type="number" id="aides_sociales" name="aides_sociales" required><br>

                <label for="bourse">Bourse :</label>
                <input type="number" id="bourse" name="bourse" required><br>

                <label for="investissement">Investissement(s) :</label>
                <input type="number" id="investissement" name="investissement" required><br>

                <label for="locatif">Locatif :</label>
                <input type="number" id="locatif" name="locatif" required><br>

                <label for="autre_revenus">Autre revenus :</label>
                <input type="number" id="autre_revenus" name="autre_revenus" required><br>

                <input type="submit" value="Calculer" id="calculer_revenus">

            </form>
        </section>
        <canvas id="revenuesChart"></canvas>

    </div>
    <div id="total"></div>

</div>


<canvas id="repereRevenusChart"></canvas>

<canvas id="repereDepensesChart"></canvas>


<canvas id="barChart"></canvas>

<canvas id="revenuesBarChart"></canvas>



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

