<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>S_Budget - À propos</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="media/favicon.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
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

	<section id="about">
		<h2>À propos de S_Budget</h2>
		<p>L'objectif de S_Budget se repose sur trois piliers :</p>
		<ol>
			<li><strong>Suivi des recettes/dépenses :</strong> Pour vous permettre de mieux comprendre où va votre argent et comment vous pouvez l'utiliser de manière plus efficace.</li>
			<li><strong>Planification du budget :</strong> Pour vous aider à définir vos objectifs financiers et à créer un plan d'action réaliste pour les atteindre.</li>
			<li><strong>Analyse des tendances :</strong> Pour vous donner une vue d'ensemble de vos habitudes de dépenses et de la manière dont elles évoluent au fil du temps.</li>
		</ol>
		<p>Notre plateforme web est accessible sur tous les appareils du public cible de manière conviviale et intuitive pour répondre aux besoins du particulier (sur smartphone, tablette, ordinateur).</p>
	</section>

	<section1 class="container_1">
		<h2 class="title">
			<span class="primary">Meet your team</span>
			<span class="secondary" >...</span>
		</h2>
		<div class="gallery-wrapper">
			<figure class="gallery-item">
				<img src="https://www.conseiller.ca/wp-content/uploads/sites/4/2019/05/calculer-depenses-800x600.jpg" alt="" class="item-image" />
				<figcaption class="item-description">
					<h2 class="name">Suivi</h2>
					<span class="role">Comprendre le comportement de votre budget</span>
				</figcaption>
			</figure>
		
			<figure class="gallery-item">
				<img src="https://image.freepik.com/vecteurs-libre/planification-gestion-du-temps-planification_108855-1640.jpg" alt="" class="item-image" />
				<figcaption class="item-description">
					<h2 class="name">Planification</h2>
					<span class="role">Définir vos objectifs financiers</span>
				</figcaption>
			</figure>

			<figure class="gallery-item">
				<img src="https://thumbs.dreamstime.com/b/businessman-analyse-business-concept-separated-white-40517419.jpg" alt="" class="item-image" />
				<figcaption class="item-description">
					<h2 class="name">Analyse</h2>
					<span class="role">Vue d'ensemble sur vos habitudes mensuelles</span>
				</figcaption>
			</figure>


		</div>
	</section1>




</body>
</html>