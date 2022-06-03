<?php 
    session_start();
    $_SESSION["companystatus"]="companystatus";
    unset($_SESSION["companystatus"]);
    header("location: index.php?nav=compay&page=login");
?>