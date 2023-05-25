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
    <title>Page d'Inscription</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 300px;
            padding: 20px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }

        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;

        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .btn:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" onsubmit="return checkPassword();">
        <label for="username"><b>Pseudonyme</b></label>
        <input type="text" name="username" id="username" placeholder="Entrez votre pseudonyme" required>

        <label for="email"><b>E-mail</b></label>
        <input type="email" name="email" id="email" placeholder="Entrez votre email" required>

        <label for="password"><b>Mot de passe</b></label>
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>

        <label for="confirm_password"><b>Confirmez le mot de passe</b></label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez votre mot de passe" required>

        <input class="btn" type="submit" value="S'inscrire">
        <a href="login.php">Se connecter</a>
    </form>
</div>

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
</body>
</html>
