<?php

$dbhost = "localhost";
$dbuser = "id20784698_sbudgetefrei";
$dbpassword = "EFREIparis2023!";
$dbname = "id20784698_sbudgetmain";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$con) {
    die("failed to connect!");
}

?>