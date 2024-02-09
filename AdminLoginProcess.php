<?php
include "connection.php";
// echo "Hello";


$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo ("enter your admin Email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email Address");
} else if (empty($password)) {
    echo ("enter your admin Password");
} else if (strlen($password) < 5 || strlen($password) > 15) {
    echo ("Invalid your password");
} else {
    $admin =  Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' AND `password` ='" . $password . "'");

    $admin_num = $admin->num_rows;

    if ($admin_num == 1) {
        $admin_data = $admin->fetch_assoc();
        session_start();

        $_SESSION["Admin"] = $admin_data;
        echo ("Success");
    } else {
        echo ("Error invalid admin");
    }
}
?>
