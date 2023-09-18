<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>My Shop</title>
</head>

<body>
    <div class="container my-5">
        <h2>Lista klijenata</h2>
        <a class=" btn btn-primary" href="/MYSHOP/dodaj.php" role="button">Dodaj klijenta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Mesto</th>
                    <th>Datum</th>
                    <th>Operacija</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'klase.php';
                $db = new Dbconn();
                $conn = $db->connmysqli();

                $sql = "SELECT * FROM klijenti";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Greska: " . $conn->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[ime] </td>
                        <td>$row[email]</td>
                        <td>$row[telefon]</td>
                        <td>$row[mesto]</td>
                        <td>$row[datum_unosa]</td>
                        <td>
                            <a class='btn btn-primary' href='/MYSHOP/izmeni.php?id= $row[id]' role='button'>Izmeni</a>
                            <a class='btn btn-danger' href='/MYSHOP/izbrisi.php?id= $row[id]' role='button'>Obrisi</a>
                        </td>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>