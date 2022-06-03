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
            if (isset($_GET["nav"]) && $_GET["nav"] == "compay") {
                include "blocks/compay.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "addcompany") {
                include "blocks/add-company.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "companylist") {
                include "blocks/company-list.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "add") {
                include "blocks/add.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "delete") {
                include "blocks/delete.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "edit") {
                include "blocks/edit.php";
            } else if (isset($_GET["nav"]) && $_GET["nav"] == "logout") {
                include "blocks/logout.php";
            } else {
                include "blocks/admin.php";
            }
            ?>
    </div>
    </div>
</body>

</html>