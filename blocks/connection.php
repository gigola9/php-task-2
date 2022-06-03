<?php 
    $host = "localhost";
    $user = "master2022";
    $pass = "master2022";
    $db = "vacancy";

    $connection = mysqli_connect($host, $user, $pass, $db);
    if(!$connection) {
        die("Error!!!");
    }
?>