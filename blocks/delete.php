<?php 
    include "connection.php";
    $id = $_GET["id"];
    $delete = "DELETE FROM vacancies WHERE id='$id'";
    if(mysqli_query($connection, $delete)) {
        header("location: index.php?nav=compay&page=login");
    }
?>