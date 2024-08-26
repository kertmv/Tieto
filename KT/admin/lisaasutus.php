<?php
include("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login");
    exit;
}

$tyybid = [];

$sqlTyybid = "SELECT tyyp FROM tyybid";
$sqlTyybidResult = $yhendus->query($sqlTyybid);

if ($sqlTyybidResult) {
    while ($tyyp = $sqlTyybidResult->fetch_assoc()) {
        $tyybid[] = $tyyp['tyyp'];
    }
} else {
    echo "Error fetching types: " . htmlspecialchars($yhendus->error);
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa asutus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Lisa asutus</h1>
        <hr>
        <br><br>
        <form method="post">
            <label for="nimi">Nimi</label>
            <input type="text" name="nimi" id="nimi" class="form-control" required>
            <br>

            <label for="aadress">Aadress</label>
            <input type="text" name="aadress" id="aadress" class="form-control" required>
            <br>

            <label for="tyyp">Tüüp</label>
            <select name="tyyp" id="tyyp" class="form-select" required>
                <?php foreach ($tyybid as $tyyp_option) { ?>
                    <option value="<?php echo htmlspecialchars($tyyp_option); ?>"><?php echo htmlspecialchars($tyyp_option); ?></option>
                <?php } ?>
            </select>
            <br>
            <a href="/php/KT/admin" class="btn btn-secondary">Tagasi</a>
            <input type="submit" class="btn btn-primary" value="Salvesta">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nimi']) && !empty($_POST['aadress']) && !empty($_POST['tyyp'])) {
                $nimi = $yhendus->real_escape_string($_POST['nimi']);
                $aadress = $yhendus->real_escape_string($_POST['aadress']);
                $tyyp = $yhendus->real_escape_string($_POST['tyyp']);

                $sqlInsert = "INSERT INTO asukohad (nimi, asukoht, tyybid) VALUES ('$nimi', '$aadress', '$tyyp')";
                if ($yhendus->query($sqlInsert) === TRUE) {
                    echo "Hoone lisatud";
                    header("Location: /php/KT/admin/");
                    exit;
                } else {
                    echo "Error: " . htmlspecialchars($yhendus->error);
                }
            }
        }
        $yhendus->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
