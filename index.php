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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="media/favicon.ico" sizes="32x32">
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

		<section id="intro">
			<h1>S_Budget</h1>
			<p>Un outil simple pour gérer votre budget mensuel.</p>
			<a href="yourbudget.php">Commencer</a>
	</section>


		<body>

			<section id="features">
				<h2>Fonctionnalités</h2>

				<div>
					<img src="media/image_index1.png" alt="Gestion des dépenses">
					<h3>Gestion des dépenses</h3>
					<p>Gérez facilement vos dépenses et suivez où va votre argent.</p>
				</div>

				<div>
					<img src="media/image_index2.png" alt="Suivi des économies">
					<h3>Suivi des économies</h3>
					<p>Suivez vos économies et voyez comment elles augmentent avec le temps.</p>
				</div>

				<div>
					<img src="media/image_index3.png" alt="Planification budgétaire">
					<h3>Planification budgétaire</h3>
					<p>Planifiez votre budget et fixez des objectifs pour vous aider à atteindre vos objectifs financiers.</p>
				</div>
			</section>

			<section id="testimonials">
				<h2>Témoignages</h2>

				<div class="testimonial active">
					<p>"S_Budget a changé ma vie. Je suis maintenant capable de gérer mon argent de manière beaucoup plus efficace." - Étudiant à l'Université de Paris</p>
				</div>

				<div class="testimonial">
					<p>"Je ne savais pas comment organiser mon budget avant d'utiliser S_Budget. Maintenant, je peux économiser pour l'avenir." - Étudiante à l'Université de Lyon</p>
				</div>

				<button id="prev">← Précédent</button>
				<button id="next">Suivant →</button>
			</section>
			<script>
				const testimonials = Array.from(document.querySelectorAll('.testimonial'));
				let currentIndex = 0;

				document.getElementById('prev').addEventListener('click', () => {
					testimonials[currentIndex].classList.remove('active');
					currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
					testimonials[currentIndex].classList.add('active');
				});

				document.getElementById('next').addEventListener('click', () => {
					testimonials[currentIndex].classList.remove('active');
					currentIndex = (currentIndex + 1) % testimonials.length;
					testimonials[currentIndex].classList.add('active');
				});
			</script>

		<section id="faq">
			<h2>FAQ</h2>

			<div class="faq-item active">
				<p><strong>Comment puis-je commencer à utiliser S_Budget ?</strong><br>
				Cliquez sur le bouton "Commencer maintenant" sur notre page d'accueil pour vous inscrire et commencer à utiliser notre outil de gestion de budget.</p>
			</div>

			<div class="faq-item">
				<p><strong>Est-ce que S_Budget est gratuit ?</strong><br>
				Oui, S_Budget est totalement gratuit pour les étudiants. Nous proposons également un plan premium avec des fonctionnalités supplémentaires.</p>
			</div>

			<!-- ... autres questions ... -->

			<button id="faq-prev">← Précédent</button>
			<button id="faq-next">Suivant →</button>
		</section>

		<script>
			const faqItems = Array.from(document.querySelectorAll('.faq-item'));
			let faqIndex = 0;

			document.getElementById('faq-prev').addEventListener('click', () => {
				faqItems[faqIndex].classList.remove('active');
				faqIndex = (faqIndex - 1 + faqItems.length) % faqItems.length;
				faqItems[faqIndex].classList.add('active');
			});

			document.getElementById('faq-next').addEventListener('click', () => {
				faqItems[faqIndex].classList.remove('active');
				faqIndex = (faqIndex + 1) % faqItems.length;
				faqItems[faqIndex].classList.add('active');
			});
		</script>





		<section id="contact">
			<h2>Contactez-nous</h2>
			<p>Si vous avez des questions, des commentaires ou des préoccupations, n'hésitez pas à nous contacter. Nous sommes là pour vous aider.</p>
			<p><a href="contact.php">Cliquez ici pour nous contacter</a></p>
		</section>





			<section id="cta">
				<h2>Prêt à prendre le contrôle de votre budget ?</h2>
				<a href="signup.php" style="background-color: white; padding: 10px; color: black; text-decoration: none;">Commencer maintenant</a>
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