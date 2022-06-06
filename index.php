<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <div class="nav">
            <ul>
                <li><a href="?nav=admin&page=login">ადმინისტრატორი</a></li>
                <li><a href="?nav=compay&page=login">კომპანია</a></li>
            </ul>
        </div>
    <div class="content">
        <?php
            session_start();
            if (isset($_GET["nav"]) && $_GET["nav"] == "compay" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/compay.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "addcompany" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/add-company.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "companylist" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/company-list.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "add" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/add.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "delete" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/delete.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "edit" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/edit.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "logout" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/logout.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "logoutadmin" && isset($_SESSION) && isset($_SESSION["status"])) {
                include "blocks/logout-admin.php";
            } else {
                include "blocks/admin.php";
            }
            ?>
    </div>
    </div>
</body>

</html>