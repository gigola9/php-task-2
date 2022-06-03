<?php 
    include "connection.php";
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $select_row = "SELECT * FROM vacancies WHERE ID = '$id'";
        $result = mysqli_query($connection, $select_row);
        $row = mysqli_fetch_assoc($result);
    }
?>

<h2>ვაკანსიის რედაქტირება</h2>
<form method="post">
    <input type="text" name="name" value="<?=$row['name']?>" placeholder="name" required>
    <br>
    <input type="text" name="description" value="<?=$row['description']?>" placeholder="description" required>
    <br>
    <input type="submit" value="რედაქტირება" name="edit">
</form>

<?php
    if(isset($_POST["edit"])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $code = $_POST["code"];
        $author	= $_POST["author"];
        $edit = "UPDATE vacancies set name='$name', description='$description' where id='$id'";
        if(mysqli_query($connection, $edit)) {
            header("location: index.php?nav=compay&page=login");
        }
    }
?>