<?php 
    $randomPages = rand(50, 1000);
    $calculatePrice = $randomPages * 20;

    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $randomNUmbersForCompanyName = rand(5, 10);
    for ($i = 0; $i < $randomNUmbersForCompanyName; $i++) {
        $randomString .= $alphabet[rand(0, strlen($alphabet) - 1)];
    }
    $randmCode = rand(100000000, 999999999);

    $randomForDate= mt_rand(1262055681,1262055681);
    $randomDate = '2009-12-10';

    $randomPassword = "";
    for ($i = 0; $i < 4; $i++) {
        $randomPassword .= $alphabet[rand(0, strlen($alphabet) - 1)];
    }
    $passwordResult = $randomPassword.(string) rand(0, 9);
?>

<h2>კომპანიის დამატება</h2>
<form method="post">
    <input type="text" name="name" placeholder="name" required value="<?=$randomString?>">
    <br>
    <input type="number" name="code" value="<?=$randmCode?>" placeholder="code">
    <br>
    <input type="date" name="date" value="<?=$randomDate?>" placeholder="date">
    <br>
    <input type="text" name="password" value="<?=$passwordResult?>" placeholder="password">
    <br>
    <input type="submit" value="დამატება" name="add">
</form>

<?php
    include "connection.php";
    if(isset($_POST["add"])) {
        $name = $_POST["name"];
        $code = $_POST["code"];
        $date = $_POST["date"];
        $password = $_POST["password"];
        $insert = "INSERT INTO company(name, code, date, password) VALUES('$name', '$code', '$date', '$password')";
        if(mysqli_query($connection, $insert)) {
            header("location: index.php?nav=admin&page=login");
        }
    }
?>