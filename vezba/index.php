<?php include"dbConnPDO.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table>
        <th>
            <td>id</td>
            <td>ime</td>
            <td>email</td>
        </th>
        <tr>
        <?php
            foreach($result as $row){
                echo $row["id"]."<br>";
                echo $row["ime"]."<br>";
                echo $row["email"]."<br>";
            }
        ?>
        </tr>
    </table>
</body>
</html>
