<table>
        <tr>
            <th>კომპანიის სახელი</th>
            <th>საიდენტიფიკაციო კოდი</th>
            <th>თარიღი</th>
            <th>პაროლი</th>
        </tr>
        <?php
        include "connection.php";

        $query = "SELECT * FROM company";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['password'] ?></td>
                </tr>
        <?php
            }
        }
        ?>
</table>