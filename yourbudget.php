<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    if (!isset($user_data['user_username'])) {
        $_SESSION['message'] = '<p style="color: red; text-align: center; padding: 2px; width: 100vw;">Pour accéder à <b>Votre budget</b>, veuillez vous connecter !</p>';
        header("Location: login.php");
        die;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loyer = $_POST['loyer'];
    $services_publics = $_POST['services_publics'];
    $alimentation = $_POST['alimentation'];
    $hygiene = $_POST['hygiene'];
    $abonnements = $_POST['abonnements'];
    $assurances = $_POST['assurances'];
    $transport = $_POST['transport'];
    $divertissement = $_POST['divertissement'];
    $autre_depenses = $_POST['autre_depenses'];
    $salaire = $_POST['salaire'];
    $aides_sociales = $_POST['aides_sociales'];
    $bourse = $_POST['bourse'];
    $investissement = $_POST['investissement'];
    $locatif = $_POST['locatif'];
    $autre_revenus = $_POST['autre_revenus'];

    $query = "INSERT INTO user_data (user_id, loyer, servicepublic, alimentation, hygiene, abonnements, assurances, transports, divertissement, autredepense, salaire, aidesociales, bourse, investissements, locatif, autrerevenus) VALUES (" . $user_data['user_id'] . ", '$loyer', '$services_publics', '$alimentation', '$hygiene', '$abonnements', '$assurances', '$transport', '$divertissement', '$autre_depenses', '$salaire', '$aides_sociales', '$bourse', '$investissement', '$locatif', '$autre_revenus')";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    } else {
        $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: green; text-align: center; padding: 2px; width: 100vw;">Désormais enregistré dans votre historique. Vous pouvez consulter dans <a href="profile.php">Votre profil</a>.</p>';
        header("Location: yourbudget.php");
        die;
    }
    die;
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
<?php

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $message = '';
}

echo $message;

?>
<form method="post">
<div class="container_2">
    <div class="left">
        <section id="form">
            <h2>Entrez vos dépenses mensuelles</h2>
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

                <button type="button" id="calculer_depenses" onclick="recup_depenses(event)">Calculer</button>
            <p id="totalDepenses"></p>
        </section>
        <canvas id="depensesChart"></canvas>

    </div>

    <div class="right">
        <section id="form">
            <h2>Entrez vos revenus mensuels</h2>
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

                <button type="button" id="calculer_depenses" onclick="recup_revenus(event)">Calculer</button>
        </section>
        <canvas id="revenuesChart"></canvas>

    </div>
    <div id="total"></div>
</div>
    <input type="submit" value="Sauvegarder" id="submit">


<canvas id="repereRevenusChart"></canvas>

<canvas id="repereDepensesChart"></canvas>


<canvas id="barChart"></canvas>

<canvas id="revenuesBarChart"></canvas>

<canvas id="zoneChart"></canvas>

</form>

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

<script src="js/script.js"></script>

</html>

