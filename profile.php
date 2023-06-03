<?php
session_start();

include("conncetion.php");
include("functions.php");

$user_data = check_login($con);

if (!isset($user_data['user_username'])) {
    $_SESSION['message'] = '<p style="color: red; text-align: center; padding: 2px; width: 100vw;">Pour accéder à <b>Profile</b>, veuillez vous connecter !</p>';
    header("Location: login.php");
}

$query = "SELECT * FROM user_profile as D, user as U WHERE D.user_id = " . $user_data['user_id'] . " AND U.user_id = D.user_id ";
$result = mysqli_query($con, $query);
if($result && mysqli_num_rows($result) > 0) {
    $query = "SELECT * FROM user_profile WHERE user_id = " . $user_data['user_id'];
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }
    $user_data_profil = mysqli_fetch_assoc($result);
} else {
    $query = "INSERT INTO user_profile (user_id) VALUES (". $user_data['user_id'] .")";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }

    $query = "SELECT * FROM user_profile WHERE user_id = " . $user_data['user_id'];
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }
    $user_data_profil = mysqli_fetch_assoc($result);
}

print_r($user_data_profil);

// POST REQUEST

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $userPostalCode = $_POST["postal_code"];
    $userAge = $_POST["age"];
    $userGender = $_POST["gender"];
    $housingType = $_POST["housing_type"];
    $maritalStatus = $_POST["marital_status"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "UPDATE user_profile SET zipcode='$userPostalCode', age=$userAge, gender='$userGender', housing_type='$housingType', marital_status='$maritalStatus' WHERE user_id = " . $user_data['user_id'];
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>S.BUDGET - Profil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="media/favicon.ico" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<style>
    #profil, #modifier_profil {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
    }
    #modifier_profil {
        display: none;
    }
    #modifier_profil form {
        display: grid;
        gap: 10px;
    }

    #modifier_profil label {
        margin-top: 10px;
    }
</style>
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
            <?php if(!isset($user_data['user_username'])) echo '<a href="login.php">Connexion / Inscription</a>' ?>
            <?php if(isset($user_data['user_username'])) {echo '<div class="dropdown"><button class="dropbtn"> Utilisateur : '. $user_data['user_username'] . '</button><div class="dropdown-content"><a href="profile.php">Votre Profil</a><a href="logout.php">Déconnexion</a></div></div>';} ?>
        </div>
    </nav>
</header>

<section id="profil">
    <h2>Vos informations</h2>
    <p><strong>Nom :</strong> <?php echo $user_data['user_username']; ?></p>
    <p><strong>Code postal :</strong> <?php echo $user_data_profil['zipcode']; ?></p>
    <p><strong>Âge :</strong> <?php echo $user_data_profil['age']; ?></p>
    <p><strong>Sexe :</strong> <?php echo $user_data_profil['gender']; ?></p>
    <p><strong>Type de logement :</strong> <?php echo $user_data_profil['housing_type']; ?></p>
    <p><strong>État matrimonial :</strong> <?php echo $user_data_profil['marital_status']; ?></p>
    <button id="modifier_profil_bouton">Modifier mon profil</button>
</section>

<section id="modifier_profil">
    <h2>Modifier vos informations</h2>
    <form method="post">
        <!-- <label for="username">Nom :</label>
        <input type="text" id="username" name="username" value="<?php // echo $user_data['user_username']; ?>">-->

        <label for="postal_code">Code postal :</label>
        <input type="text" id="postal_code" name="postal_code" value="<?php echo $user_data_profil['zipcode']; ?>">

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" value="<?php echo $user_data_profil['age']; ?>">

        <label for="gender">Sexe :</label>
        <input type="text" id="gender" name="gender" value="<?php echo $user_data_profil['gender']; ?>">

        <label for="housing_type">Type de logement :</label>
        <input type="text" id="housing_type" name="housing_type" value="<?php echo $user_data_profil['housing_type']; ?>">

        <label for="marital_status">État matrimonial :</label>
        <input type="text" id="marital_status" name="marital_status" value="<?php echo $user_data_profil['marital_status']; ?>">

        <input type="submit" value="Mettre à jour">
    </form>
</section>
<script>
    document.getElementById("modifier_profil_bouton").addEventListener("click", function() {
        document.getElementById("modifier_profil").style.display = "block";
    });
</script>

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