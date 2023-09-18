<?php
require_once "klase.php";
$db = new Dbconn();
$conn = $db->connmysqli();

$id = "";
$ime = "";
$email = "";
$telefon = "";
$mesto = "";


$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: /myshop/index.php");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM klijenti WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

if (!$row) {
    header("Location: /myshop/index.php");
    exit;
}

    $ime = $row['ime'];
    $email = $row['email'];
    $telefon = $row['telefon'];
    $mesto = $row['mesto']; 
}





else
{
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $mesto = $_POST['mesto'];

    do{
        if(empty($id) || empty($ime) || empty($email) || empty($telefon) || empty($mesto))
        {
            $errorMessage = "Sva polja su obavezna";
            break;
        }

        $sql="UPDATE klijenti SET ime='$ime', email='$email', telefon='$telefon', mesto='$mesto' WHERE id=$id";

        $result=$conn->query($sql);
        if(!$result)
        {
            $errorMessage = "Greska pri izmeni";
            break;
        }

        $successMessage = "Uspesno izmenjen klijent";
        header("Location: /myshop/index.php");

    }while(false);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Novi klijent</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong> $errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='zatvori'></button>
                </div>
                ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row mb-3">
                <label for="ime" class="col-sm-3 col-form-label">Ime:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ime" value="<?php echo $ime ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label for="telefon" class="col-sm-3 col-form-label">Telefon:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telefon" value="<?php echo $telefon ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="mesto" class="col-sm-3 col-form-label">Mesto:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mesto" value="<?php echo $mesto ?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                            <div class='row-mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissable fade show' role='alert'>
                                        <strong> $successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dissmis='alert' aria-label='zatvori'></button>
                                    </div>
                                </div>
                            </div>
                        ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Ponisti</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>