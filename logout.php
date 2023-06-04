<?php
session_start();

if(isset($_SESSION)) {
    session_unset();
}
if(isset($user_data)) {
    unset($user_data);
}

$_SESSION['message'] = '<p style="background-color: #f2f2f2; color: green; text-align: center; padding: 2px; width: 100vw;">Vous êtes maintenant <b>déconnecté</b>.</p>';
header("Location: login.php");
die;

?>