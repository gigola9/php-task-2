<?php 
    include "connection.php";
    $status = "";
    if(isset($_SESSION) && isset($_SESSION["companystatus"])) {
        $status = $_SESSION["companystatus"];
    }
    if($status == "authorized") {
        ?>
            <a href="?nav=add" style="border: 2px solid green; padding: 5px;">ვაკანსიის დამატება</a>
            <a href="?nav=logout" style="border: 2px solid red; padding: 5px;">გასვლა</a>

            <table>
                <tr>
                    <th>სახელი</th>
                    <th>აღწერა</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                include "connection.php";

                $query = "SELECT * FROM vacancies";
      
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><a href="?nav=edit&id=<?=$row['id']?>">რედაქტირება</a></td>
                            <td><a href="?nav=delete&id=<?=$row['id']?>">წაშლა</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
        </table>
        <?php
    } else {
        if($_GET["page"] == "login") { 
           ?>
            <h1>შესვლა</h1>
            <form style="display: flex; flex-direction: column;" method="post">
                <label>კომპანია</label>
                <input type="text" name="nickname" required>
                <label>პაროლი</label>
                <input type="password" name="password" required>
                <button type="submit" name="login">შესვლა</button>
            </form>
           <?php
        }
    }
?>

<?php
    if(isset($_POST["login"])) {
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
     
        $query = "SELECT * FROM company WHERE name='$nickname'  and password='$password'";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION["companystatus"]="authorized";
            header("location: index.php?nav=compay&page=login");
        }
    }
?>
    