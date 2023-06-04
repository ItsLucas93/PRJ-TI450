<?php
session_start();

    include("conncetion.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];

        //echo($user_username. " " . $user_email . " " . $user_password . " | " . !empty($user_username) . " " . !empty($user_password) . " " . (!is_numeric($user_username)));

        if(!empty($user_username) && !empty($user_password) && (!is_numeric($user_username)))
        {
            // read to database
            //echo($user_username. " " . $user_email . " " . $user_password . " " . $user_id);
            $query = "SELECT * FROM user WHERE user_username = '$user_username' limit 1";
            $result = mysqli_query($con, $query);
            if ($result)
            {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['user_password'] === $user_password) {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        // header("Location: index.php");
                        die;
                    }
                    else {
                        echo "Wrong Password";
                    }
                }
                else {
                    echo "Wrong Username";
                }
            }
        } else {
            echo "Please enter valid information";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }

        input[type=text], input[type=password] {
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

    <form method="post">
        <label for="uname"><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrez le nom d'utilisateur" name="username" required>

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez le mot de passe" name="password" required>

        <input class="btn" type="submit" value="Se connecter">

        <a href="signup.php">Inscrire</a>
    </form>
</div>
</body>
</html>

