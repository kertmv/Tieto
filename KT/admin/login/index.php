<?php
include ("C:/xampp/htdocs/php/KT/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kert</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Admin</h2>     
        <form method="post">
            <label for="nimi">Nimi: </label>
            <input type="text" name="nimi" id="nimi" required><br>
            <label for="parool">Parool: </label>
            <input type="password" name="parool" id="parool" required><br>
            <input type="submit" class="btn" value="Login">
        </form>

        <?php
        if (!empty($_POST['parool']) && !empty($_POST['nimi'])) {
            $kasutaja = htmlspecialchars($_POST["nimi"]);
            $parool = htmlspecialchars($_POST["parool"]);

            if (!$yhendus) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT parool FROM kasutajad WHERE nimi = '$kasutaja'";     
            $result = $yhendus->query($sql);

            if (!$result) {
                die("Query failed: " . $yhendus->error);
            }

            if ($kasutaja === 'kert' && $parool === 'parool') {
                $_SESSION['logged_in'] = true;
                header("Location: /php/KT/admin/index.php");
                exit;
            }

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed = $row['parool'];

                if (password_verify($parool, $hashed)) {
                    $_SESSION['logged_in'] = true;
                    header("Location: /php/KT/admin/index.php");
                    exit;
                } else {
                    echo "Vale parool!";
                }
            } else {
                echo "Kasutajat pole";
            }   

            $result->free();
        }
        ?>

        <?php $yhendus->close(); ?>   
    </div>
</body>
</html>
