<?php 
    include "connection.php";
    $status = "";
    if(isset($_SESSION) && isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }
    if($status == "authorized") {
        ?>
            <a href="?nav=addcompany" style="border: 2px solid green; padding: 5px;">კომპანიის დამატება</a>
            <a href="?nav=companylist" style="border: 2px solid green; padding: 5px;">კომპანიის ჩამონათვალი</a>
            <a href="?nav=logoutadmin" style="border: 2px solid red; padding: 5px;">გასვლა</a>
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
                <hr>
                <?php 
                 if(isset($_COOKIE["wrongg"]) && $_COOKIE["wrongg"] > 3) {
                    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomStrings = '';
                    $randomNUmbersForCompanyName = rand(5, 10);
                    for ($i = 0; $i < $randomNUmbersForCompanyName; $i++) {
                        $randomStrings .= $alphabet[rand(0, strlen($alphabet) - 1)];
                    }
                ?>
                <label>უსაფრთხოების კოდი: </label>
                <input type="text" value="<?=$randomStrings?>" name="codeoriginals">
                <input type="text" name="codes" required>
                <?php
                }
                
                ?>
                <hr>
                <button type="submit" name="login">შესვლა</button>
            </form>
            <a href="?nav=admin&page=register">რეგისტრაცია</a>
           <?php
        } else if($_GET["page"] == "register") {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $randomNUmbersForCompanyName = rand(5, 10);
            for ($i = 0; $i < $randomNUmbersForCompanyName; $i++) {
                $randomString .= $alphabet[rand(0, strlen($alphabet) - 1)];
            }
            ?>
            <h1>რეგისტრაცია</h1>
            <form style="display: flex; flex-direction: column; width: 250px;" method="post">
                <label>სახელი</label>
                <input type="email" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required pattern="^[A-Za-z0-9]*$" minlength="7">
                <label>გაიმეორეთ პაროლი</label>
                <input type="password" name="reppassword" required pattern="^[A-Za-z0-9]*$" minlength="7">
                <hr>
                <label>უსაფრთხოების კოდი: </label>
                <input type="text" value="<?=$randomString?>" name="codeoriginal">
                <input type="text" name="code" required>
                <hr>
                <button type="submit" name="register">რეგისტრაცია</button>
            </form>
            <a href="?nav=admin&page=login">ავტორიზაცია</a>
            <?php
        }
    }
?>

<?php
    if(isset($_POST["register"])) {
        if($_POST["code"] == $_POST["codeoriginal"]) {
            $nickname = $_POST["nickname"];
            $query = "SELECT * FROM admin_users WHERE nickname='$nickname'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<h3 style='color: red;'>ასეთი მომხმარებელი უკვე არსებობს</h3>";
            } else {
                $nickname = $_POST["nickname"];
                $password = $_POST["password"];
             
                $insert = "INSERT INTO admin_users(nickname, password) VALUES('$nickname', '$password')";
                if(mysqli_query($connection, $insert)) {
                   header("location: index.php?nav=admin&page=login");
                }
            }
        } else {
            echo "<h3 style='color: red;'>კოდი არასწორია</h3>";
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
                setcookie("wrongg", 0, time()-60, "/");
            } else {
                if(isset($_COOKIE) && isset($_COOKIE["wrongg"])) {
                    $wrng = $_COOKIE["wrongg"] + 1;
                    setcookie("wrongg", $wrng, time()+10, "/");
                } else {
                    setcookie("wrongg", 1, time()+10, "/");
                }
            }
    }
?>
    