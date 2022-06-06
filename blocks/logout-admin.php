<?php 
    session_start();
    $_SESSION["status"]="";
    unset($_SESSION["status"]);
    header("location: index.php?nav=admin&page=login");
?>