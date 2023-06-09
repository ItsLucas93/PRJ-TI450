<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!-- <!DOCTYPE html>
<html lang="fr">
    <head>
        <title>S.BUDGET - Accueil</title>
    </head>

    <body>
    <?php if(!isset($user_data['user_username'])) echo '<a href="login.php">Login</a><br>' ?>
    <a href="signup.php">Signup</a><br>
    <?php if(isset($user_data['user_username'])) echo '<a href="logout.php">Logout</a><br>' ?>

    <br>
    <h1>Hello <?php if(isset($user_data['user_username'])) {echo $user_data['user_username'];} else {echo null;} ?></h1>
    </body>
</html> -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>S_Budget</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon", type="image/png" href="media/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<header>
    <nav>
        <div class="nav-logo">
            <a href="index.html"><img src="media/logo_Header_1100x400.png" alt="Logo"></a>
        </div>
        <div class="dummy-nav-item"></div>
        <ul>
            <li class="current"><a href="index.html">Accueil</a></li>
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

<section id="intro">
    <h1>S_Budget</h1>
    <p>Un outil simple pour gérer votre budget mensuel.</p>
    <a href="yourbudget.html">Commencer</a>
</section>
</body>
</html>
