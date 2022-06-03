<h2>ვაკანსიის დამატება</h2>
<form method="post">
    <input type="text" name="name" placeholder="name" required>
    <br>
    <input type="text" name="description" placeholder="description" required>
    <br>
    <input type="submit" value="დამატება" name="add">
</form>

<?php
    include "connection.php";
    if(isset($_POST["add"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $code = $_POST["code"];
        $author	= $_POST["author"];
        $insert = "INSERT INTO vacancies(name, description) VALUES('$name', '$description')";
        if(mysqli_query($connection, $insert)) {
            header("location: index.php?nav=compay&page=login");
        }
    }
?>