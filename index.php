<?php 
include("config.php"); 
session_start(); 
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
                    <input type="text" name="otsi" id="otsi" class="form-control" placeholder="Otsi asukohta">
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
                        <th>Asukoht</th>
                        <th>Tänav</th>
                        <th>Keskmine hinne</th>
                        <th>Hindeid</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $itemsPerPage = 10;
                    $page = isset($_GET['leht']) ? (int)$_GET['leht'] : 1;
                    $offset = ($page - 1) * $itemsPerPage;
                    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'nimi';
                    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';
                    $searchTerm = isset($_GET['otsi']) ? $_GET['otsi'] : '';
                    $searchQuery = $searchTerm ? "WHERE nimi LIKE '%$searchTerm%'" : '';

                    $queryTotalItems = "SELECT COUNT(*) as total FROM asukohad $searchQuery";
                    $totalItemsResult = $yhendus->query($queryTotalItems);
                    $totalItems = $totalItemsResult->fetch_assoc()['total'];
                    $totalPages = ceil($totalItems / $itemsPerPage);

                    $queryLocations = "SELECT * FROM asukohad $searchQuery ORDER BY $sortColumn $sortOrder LIMIT $offset, $itemsPerPage";
                    $result = $yhendus->query($queryLocations);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $locationName = $row['nimi'];
                            $locationId = $row['id'];

                            $queryRatingsCount = "SELECT COUNT(hinnang) AS ratings_count FROM hinnangud WHERE asukohad_id = '$locationId'";
                            $ratingsResult = $yhendus->query($queryRatingsCount);
                            $ratingsCount = $ratingsResult->fetch_assoc()['ratings_count'];

                            $queryAverageRating = "SELECT AVG(hinnang) AS average_rating FROM hinnangud WHERE asukohad_id = '$locationId'";
                            $averageRatingResult = $yhendus->query($queryAverageRating);
                            $averageRating = $averageRatingResult->fetch_assoc()['average_rating'];
                            $averageRatingRounded = round($averageRating, 1);

                            $updateQuery = "UPDATE asukohad SET kesk_hinne = '$averageRatingRounded', hinnete_arv = '$ratingsCount' WHERE id = '$locationId'";
                            $yhendus->query($updateQuery);
                            ?>
                            <tr>
                                <td><a href="hinne.php?asukoht=<?php echo urlencode($locationId); ?>"><?php echo htmlspecialchars($row["nimi"]); ?></a></td>
                                <td><?php echo htmlspecialchars($row["asukoht"]); ?></td>
                                <td><?php echo htmlspecialchars($averageRatingRounded); ?></td>
                                <td><?php echo htmlspecialchars($ratingsCount); ?></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?leht=<?php echo $page - 1; ?>&otsi=<?php echo urlencode($searchTerm); ?>">&lt; Eelmine</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?leht=<?php echo $page + 1; ?>&otsi=<?php echo urlencode($searchTerm); ?>">Järgmine &gt;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
    </div>
</body>
</html>
