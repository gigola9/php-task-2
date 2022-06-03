<?php 
    session_start();
    include "connection.php";
    $status = "";
    if(isset($_SESSION) && isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }
    if($status == "authorized") {
        ?>
            <a href="?nav=addcompany" style="border: 2px solid green; padding: 5px;">კომპანიის დამატება</a>
            <a href="?nav=companylist" style="border: 2px solid green; padding: 5px;">კომპანიის ჩამონათვალი</a>
        <?php
    } else {
        if($_GET["page"] == "login") { 
           ?>
            <h1>შესვლა</h1>
            <form style="display: flex; flex-direction: column;" method="post">
                <label>სახელი</label>
                <input type="text" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required>
                <button type="submit" name="login">შესვლა</button>
            </form>
            <a href="?nav=admin&page=register">რეგისტრაცია</a>
           <?php
        } else if($_GET["page"] == "register") {
            ?>
            <h1>რეგისტრაცია</h1>
            <form style="display: flex; flex-direction: column;" method="post">
                <label>სახელი</label>
                <input type="text" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required>
                <label>გაიმეორეთ პაროლი</label>
                <input type="password" name="reppassword" required>
                <button type="submit" name="register">რეგისტრაცია</button>
            </form>
            <a href="?nav=admin&page=login">ავტორიზაცია</a>
            <?php
        }
    }
?>

<?php
    if(isset($_POST["register"])) {
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
     
        $insert = "INSERT INTO admin_users(nickname, password) VALUES('$nickname', '$password')";
        if(mysqli_query($connection, $insert)) {
           header("location: index.php?nav=admin&page=login");
        }
    }

    if(isset($_POST["login"])) {
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
     
        $query = "SELECT * FROM admin_users WHERE nickname='$nickname'  and password='$password'";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["status"]="authorized";
            header("location: index.php?nav=admin&page=login");
        }
    }
?>
    