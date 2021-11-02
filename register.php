<?php
require_once("connect.php");
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($connect, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password')");

    header("Location: ".$address_site."/users.php");