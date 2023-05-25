<?php

function check_login($con) {

    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            print_r($result);
            return mysqli_fetch_assoc($result);
        }
    }

    return false;
}

function random_num($con, $lenght) {

    $text = "";
    if($lenght < 5)
    {
        $lenght = 5;
    }

    // while (!mysqli_num_rows(mysqli_query($con, "SELECT user_id FROM USER WHERE user_id = '$text' limit 1")) > 0) {
        $len = rand(4, $lenght);
        for ($i = 0; $i < $len; $i++) {
            $text .= rand(0, 9);
        }
    //  }

    return $text;
}