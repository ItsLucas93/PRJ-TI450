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
    <div class="container">
        <h2>À propos de nous</h2>
        <p>Bienvenue sur S_Budget, votre plateforme incontournable pour gérer vos finances personnelles et votre budget de manière efficace. Notre mission est de permettre aux individus et aux familles de prendre le contrôle de leurs finances et d'atteindre leurs objectifs financiers.</p>
        <p>Chez S_Budget, nous croyons que le bien-être financier est essentiel pour une vie sans stress et épanouissante. Notre équipe d'experts financiers et de technologues a développé un outil de budget convivial et intuitif qui vous aide à suivre vos revenus, vos dépenses et vos économies.</p>
        <p>Avec S_Budget, vous pouvez créer des budgets personnalisés, fixer des objectifs financiers, analyser vos habitudes de dépenses et obtenir des informations précieuses sur votre santé financière. Notre objectif est de simplifier le processus de budgétisation et de vous fournir les outils et les connaissances nécessaires pour prendre des décisions financières éclairées.</p>
        <p>Rejoignez des milliers d'utilisateurs satisfaits qui ont déjà amélioré leur vie financière avec S_Budget. Commencez dès aujourd'hui votre parcours vers la liberté financière !</p>
    </div>

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


    <button onclick="showDetails()">En savoir plus sur le projet</button>

<script>
    function showDetails() {
        var x = document.getElementById("projectDetails");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

    <section id="projectDetails">
        <h2>Notre projet</h2>
        <hr>
        <p>Notre projet visait à créer un site Web qui aide les étudiants à gérer leur argent efficacement. Cela a impliqué la compréhension des comportements financiers des utilisateurs, le développement d'un site pour le suivi des dépenses et des revenus intuitif et facile à utiliser.</p>

        <h3>Difficultés rencontrées</h3>
        <hr>
        <p>Notre plus grand défi a été de créer une applicationpour la première fois facile à utiliser et qui fournit des informations financières sur la moyenne de la population. Nous avons également dû apprendre à travailler ensemble en tant qu'équipe et à répartir efficacement le travail entre nous, Chokri c'est occupé des bons plans et avantages pour les utilisateurs, Lucas de la base de donnée du site et enfin Hugo, Wassim et Joe pour la création de tout le site web.</p>

        <h3>Leçons apprises</h3>
        <hr>
        <p>Nous avons beaucoup appris sur la façon de travailler ensemble en tant qu'équipe et sur la façon de surmonter les défis ensemble, notamment une contrainte de temps et réussir à mettre toutes nos parties en commun. Nous avons également appris beaucoup sur comment fonctionne ainsi que crée un site web et nous espérons que notre site sera utile à nos utilisateurs.</p>
    </section>

    <footer>

        <p>Suivez-nous sur les réseaux :</p>
        <div class="social-media-icons">
            <a href="https://www.facebook.com/EfreiParis/?locale=fr_FR" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/Efrei_Paris" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/efrei_paris" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>


        <p>&copy; 2023 S_Budget - <a href="https://github.com/ItsLucas93" target="_blank" style="color: inherit; text-decoration: underline; text-decoration-color: white;">Tous droits réservés</a>.</p>
    </footer>

</body>
</html>