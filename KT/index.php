<?php
include ("C:/xampp/htdocs/php/KT/config.php");
session_start();

$asjulehel = 10;
$leht = isset($_GET['leht']) ? (int)$_GET['leht'] : 1;
$asi = ($leht - 1) * $asjulehel;

$veerud = isset($_GET['sort']) ? $_GET['sort'] : 'nimi';
$order = isset($_GET['order']) && $_GET['order'] === 'asc' ? 'desc' : 'asc';
$otsing = isset($_GET['otsi']) ? $_GET['otsi'] : '';
$otsingsisu = $otsing ? "WHERE nimi LIKE '%$otsing%'" : '';

$kokkumitu = "SELECT COUNT(*) as koikkokku FROM asukohad $otsingsisu";
$mitukokkuvastus = $yhendus->query($kokkumitu);
$kokkuasju = $mitukokkuvastus->fetch_assoc()['koikkokku'];
$lehtiveerus = ceil($kokkuasju / $asjulehel);

$otsingukoht = "SELECT * FROM asukohad $otsingsisu ORDER BY $veerud $order LIMIT $asi, $asjulehel";
$result = $yhendus->query($otsingukoht);
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            margin-top: 40px;
        }
        h1 {
            font-size: 24px;
            color: #007bff;
        }
        .table th, .table td {
            padding: 8px;
        }
        .table th {
            background-color: #007bff;
            color: #fff;
        }
        .table th a {
            color: #fff;
            text-decoration: none;
        }
        .table th a:hover {
            color: #ffdd57;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="my-4">
            <h1>kert.ee</h1>
        </header>
        
        <section>
            <form method="get" class="row g-3">
                <div class="col-auto">
                    <input type="text" name="otsi" id="otsi" class="form-control" placeholder="Otsi asukohta" value="<?php echo htmlspecialchars($otsing); ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Otsi</button>
                </div>
            </form>
        </section>

        <section class="table-container mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25%;"><a href="?sort=nimi&order=<?php echo $order; ?>&otsi=<?php echo urlencode($otsing); ?>">Nimi<?php echo $veerud === 'nimi' ? ($order === 'asc' ? ' ▲' : ' ▼') : ''; ?></a></th>
                        <th style="width: 35%;"><a href="?sort=asukoht&order=<?php echo $order; ?>&otsi=<?php echo urlencode($otsing); ?>">Asukoht<?php echo $veerud === 'asukoht' ? ($order === 'asc' ? ' ▲' : ' ▼') : ''; ?></a></th>
                        <th style="width: 20%;"><a href="?sort=keskminehinnang&order=<?php echo $order; ?>&otsi=<?php echo urlencode($otsing); ?>">Keskmine hinne<?php echo $veerud === 'keskminehinnang' ? ($order === 'asc' ? ' ▲' : ' ▼') : ''; ?></a></th>
                        <th style="width: 20%;"><a href="?sort=hinnangarv&order=<?php echo $order; ?>&otsi=<?php echo urlencode($otsing); ?>">Hindeid<?php echo $veerud === 'hinnangarv' ? ($order === 'asc' ? ' ▲' : ' ▼') : ''; ?></a></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $asukohaid = $row['id'];

                        $hinnangudkokkuquery = "SELECT COUNT(hinnang) AS hinnangarv FROM hinnangud WHERE asukoht_id = '$asukohaid'";
                        $hinnangudvastus = $yhendus->query($hinnangudkokkuquery);
                        $hinnangudkokku = $hinnangudvastus->fetch_assoc()['hinnangarv'];

                        $keskhinnangquery = "SELECT AVG(hinnang) AS keskminehinnang FROM hinnangud WHERE asukoht_id = '$asukohaid'";
                        $keskhinnangvastus = $yhendus->query($keskhinnangquery);
                        $keskhinnang = $keskhinnangvastus->fetch_assoc()['keskminehinnang'];
                        $keskhinnangymar = round($keskhinnang, 1);

                        $muudatused = "UPDATE asukohad SET keskminehinnang = '$keskhinnangymar', hinnangarv = '$hinnangudkokku' WHERE id = '$asukohaid'";
                        $yhendus->query($muudatused);
                        ?>
                        <tr>
                            <td style="width: 25%;"><a href="/php/KT/hinne.php?asukoht=<?php echo urlencode($asukohaid); ?>"><?php echo htmlspecialchars($row["nimi"]); ?></a></td>
                            <td style="width: 35%;"><?php echo htmlspecialchars($row["asukoht"]); ?></td>
                            <td style="width: 20%;"><?php echo htmlspecialchars($keskhinnangymar); ?></td>
                            <td style="width: 20%;"><?php echo htmlspecialchars($hinnangudkokku); ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <nav aria-label="leht navigation">
                <ul style="float: right;" class="pagination">
                    <?php if ($leht > 1): ?>
                        <li class="leht-item">
                            <a class="leht-link" href="?leht=<?php echo $leht - 1; ?>&otsi=<?php echo urlencode($otsing); ?>&sort=<?php echo urlencode($veerud); ?>&order=<?php echo urlencode($order); ?>">&lt; Eelmine</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($leht < $lehtiveerus): ?>
                        <li class="leht-item">
                            <a class="leht-link" href="?leht=<?php echo $leht + 1; ?>&otsi=<?php echo urlencode($otsing); ?>&sort=<?php echo urlencode($veerud); ?>&order=<?php echo urlencode($order); ?>">Järgmine &gt;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
    </div>
</body>
</html>
