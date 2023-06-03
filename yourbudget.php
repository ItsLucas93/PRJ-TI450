<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <title>Votre Budget</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="media/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
            <li class="current"><a href="index.php">Accueil</a></li>
            <li><a href="yourbudget.html">Votre Budget</a></li>
            <li><a href="about.php">À propos</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="dummy-nav-item"></div>
        <div class="nav-right">
            <a href="loginsignup.php">Connexion / Inscription</a>
        </div>
    </nav>
</header>

<div class="container_2">
    <div class="left">
        <section id="form">
            <h2>Entrez vos dépenses mensuelles</h2>
            <form onsubmit="recup_depenses(event);">

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

                <label for="remboursement">Remboursement(s) :</label>
                <input type="number" id="remboursement" name="remboursement" required><br>

                <label for="autre_depenses">Autre dépenses :</label>
                <input type="number" id="autre_depenses" name="autre_depenses" required><br>

                <input type="submit" value="Calculer">
            </form>
            <p id="totalDepenses"></p>
        </section>
        <canvas id="myChart"></canvas>

    </div>

    <div class="right">
        <section id="form">
            <h2>Entrez vos revenus mensuels</h2>
            <form onsubmit="recup_revenus(event);">

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

                <input type="submit" value="Calculer">

            </form>
        </section>
        <canvas id="revenuesChart"></canvas>

    </div>
    <div id="total"></div>

</body>
</html>
