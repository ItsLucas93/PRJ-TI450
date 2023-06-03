<?php
session_start();

if(isset($_SESSION)) {
    session_unset();
}
if(isset($user_data)) {
    unset($user_data);
}

header("Location: login.php");
die;

?>