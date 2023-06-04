<?php
session_start();

include("connection.php");
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
    } else {
        $_SESSION['message'] = '<p style="background-color: #f2f2f2; color: green; text-align: center; padding: 2px; width: 100vw;">Votre profil est maintenant <b>actualisé</b>.</p>';
        header("Location: profile.php");
        die;
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
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            <li><a href="yourbudget.php">Votre Budget</a></li>
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

<section id="profil">
    <h2>Vos informations</h2>
    <p><strong>Identifiant :</strong> <?php echo $user_data['user_username']; ?></p>
    <p><strong>E-mail :</strong> <?php echo $user_data['user_email']; ?></p>
    <p><strong>Code postal :</strong> <?php echo $user_data_profil['zipcode']; ?></p>
    <p><strong>Âge :</strong> <?php echo $user_data_profil['age']; ?></p>
    <p><strong>Sexe :</strong> <?php if($user_data_profil['gender'] == 'M') {echo 'Masculin';} elseif ($user_data_profil['gender'] == 'F') {echo 'Féminin';} else {echo 'Autre';}?></p>
    <p><strong>Type de logement :</strong> <?php if($user_data_profil['housing_type'] == 'P') echo 'Propriétaire'; elseif($user_data_profil['housing_type'] == 'L') echo 'Locataire'; elseif($user_data_profil['housing_type'] == 'O') echo 'Autre';?></p>
    <p><strong>État matrimonial :</strong> <?php if($user_data_profil['marital_status'] == 'C') {echo 'Célibataire';}elseif($user_data_profil['marital_status'] == 'M') {echo 'Marié/Mariée';}elseif($user_data_profil['marital_status'] == 'D') {echo 'Divorcé/Divorcée';}elseif($user_data_profil['marital_status'] == 'V') {echo 'Veuf/Veuve';}elseif($user_data_profil['marital_status'] == 'O') {echo 'Autre';}?></p>
    <button id="modifier_profil_bouton">Modifier mon profil</button>
</section>

<section id="modifier_profil">
    <h2>Modifier vos informations</h2>
    <form method="post">
        <!-- <label for="username">Nom :</label>
        <input type="text" id="username" name="username" value="<?php // echo $user_data['user_username']; ?>">-->

        <label for="postal_code">Code postal :</label>
        <input type="text" id="postal_code" name="postal_code" pattern="[0-9]{5}" placeholder="Entrez un code postal" value="<?php echo $user_data_profil['zipcode']; ?>">

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" placeholder="Entrez votre âge" value="<?php echo $user_data_profil['age']; ?>">

        <label for="gender">Sexe :</label>
        <select id="gender" name="gender">
            <option value="M" <?php if($user_data_profil['gender'] == 'M') echo 'selected'; ?>>Masculin</option>
            <option value="F" <?php if($user_data_profil['gender'] == 'F') echo 'selected'; ?>>Feminin</option>
            <option value="O" <?php if($user_data_profil['gender'] == 'O') echo 'selected'; ?>>Autre</option>
        </select>

        <label for="housing_type">Type de logement :</label>
        <select id="housing_type" name="housing_type">
            <option value="P" <?php if($user_data_profil['housing_type'] == 'P') echo 'selected'; ?>>Propriétaire</option>
            <option value="L" <?php if($user_data_profil['housing_type'] == 'L') echo 'selected'; ?>>Locataire</option>
            <option value="O" <?php if($user_data_profil['housing_type'] == 'O') echo 'selected'; ?>>Autre</option>
        </select>

        <label for="marital_status">État matrimonial :</label>
        <select id="marital_status" name="marital_status">
            <option value="C" <?php if($user_data_profil['marital_status'] == 'C') echo 'selected'; ?>>Célibataire</option>
            <option value="M" <?php if($user_data_profil['marital_status'] == 'M') echo 'selected'; ?>>Marié/Mariée</option>
            <option value="D" <?php if($user_data_profil['marital_status'] == 'D') echo 'selected'; ?>>Divorcé/Divorcée</option>
            <option value="V" <?php if($user_data_profil['marital_status'] == 'V') echo 'selected'; ?>>Veuf/Veuve</option>
            <option value="O" <?php if($user_data_profil['marital_status'] == 'O') echo 'selected'; ?>>Autre</option>
        </select>

        <input type="submit" value="Mettre à jour">
    </form>
</section>

<section id="historique">
    <h2>Votre historique des entrées</h2>
    <table>
        <thead>
        <tr>
            <th>Loyer</th>
            <th>Service Public</th>
            <th>Alimentation</th>
            <th>Hygiène</th>
            <th>Abonnements</th>
            <th>Assurances</th>
            <th>Transports</th>
            <th>Divertissement</th>
            <th>Autre Dépense</th>
            <th>Salaire</th>
            <th>Aide Sociales</th>
            <th>Bourse</th>
            <th>Investissements</th>
            <th>Locatif</th>
            <th>Autres Revenus</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Récupérer les données de l'utilisateur spécifique à partir de la base de données
        $query = "SELECT * FROM user_data WHERE user_id = " . $user_data['user_id'] . " ORDER BY time";
        $result = mysqli_query($con, $query);

        // Afficher les données dans le tableau HTML
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['loyer'] . "</td>";
            echo "<td>" . $row['servicepublic'] . "</td>";
            echo "<td>" . $row['alimentation'] . "</td>";
            echo "<td>" . $row['hygiene'] . "</td>";
            echo "<td>" . $row['abonnements'] . "</td>";
            echo "<td>" . $row['assurances'] . "</td>";
            echo "<td>" . $row['transports'] . "</td>";
            echo "<td>" . $row['divertissement'] . "</td>";
            echo "<td>" . $row['autredepense'] . "</td>";
            echo "<td>" . $row['salaire'] . "</td>";
            echo "<td>" . $row['aidesociales'] . "</td>";
            echo "<td>" . $row['bourse'] . "</td>";
            echo "<td>" . $row['investissements'] . "</td>";
            echo "<td>" . $row['locatif'] . "</td>";
            echo "<td>" . $row['autrerevenus'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>

</section>

<script>
    document.getElementById("modifier_profil_bouton").addEventListener("click", function() {
        if (document.getElementById("modifier_profil").style.display === "" || document.getElementById("modifier_profil").style.display === "none") {
            document.getElementById("modifier_profil").style.display = "block";
        } else {
            document.getElementById("modifier_profil").style.display = "none";
        }
    });
</script>

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