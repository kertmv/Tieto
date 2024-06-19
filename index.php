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
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 24px;
            color: #007bff;
        }
        .search-form {
            margin-top: 20px;
        }
        /* Table styles */
        .table-container {
            margin-top: 30px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .table-striped tbody tr:hover {
            background-color: #e0e0e0;
        }
        /* Pagination styles */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item .page-link {
            color: #007bff;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between align-items-center my-4">
            <h1>kert.ee</h1>
        </header>
        
        <section class="search-form">
            <form method="get" class="row g-3">
                <div class="col-auto">
                    <label for="otsi" class="visually-hidden">Otsi asukohta</label>
                    <input type="text" name="otsi" id="otsi" class="form-control" placeholder="Otsi asukohta">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Otsi</button>
                </div>
            </form>
        </section>

        <section class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Asukoht</th>
                        <th scope="col">Tänav</th>
                        <th scope="col">Keskmine hinne</th>
                        <th scope="col">Hindeid</th>
                    </tr>
                </thead>
                <?php
                    $itemsPerPage = 10;
                    $page = isset($_GET['leht']) ? (int)$_GET['leht'] : 1;
                    $offset = ($page - 1) * $itemsPerPage;
                    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'nimi';
                    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';
                    $searchTerm = isset($_GET['otsi']) ? $_GET['otsi'] : '';
                    $searchQuery = $searchTerm ? "WHERE nimi LIKE '%$searchTerm%'" : '';

                    // Total items query
                    $queryTotalItems = "SELECT COUNT(*) as total FROM asukohad $searchQuery";
                    $totalItemsResult = $yhendus->query($queryTotalItems);
                    $totalItems = $totalItemsResult->fetch_assoc()['total'];
                    $totalPages = ceil($totalItems / $itemsPerPage);

                    // Locations query
                    $queryLocations = "SELECT * FROM asukohad $searchQuery ORDER BY $sortColumn $sortOrder LIMIT $offset, $itemsPerPage";
                    $result = $yhendus->query($queryLocations);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $locationName = $row['nimi'];
                            $locationId = $row['id'];

                            // Ratings count query
                            $queryRatingsCount = "SELECT COUNT(hinnang) AS ratings_count FROM hinnangud WHERE asukohad_id = '$locationId'";
                            $ratingsResult = $yhendus->query($queryRatingsCount);
                            $ratingsCount = $ratingsResult->fetch_assoc()['ratings_count'];

                            // Average rating query
                            $queryAverageRating = "SELECT AVG(hinnang) AS average_rating FROM hinnangud WHERE asukohad_id = '$locationId'";
                            $averageRatingResult = $yhendus->query($queryAverageRating);
                            $averageRating = $averageRatingResult->fetch_assoc()['average_rating'];
                            $averageRatingRounded = round($averageRating, 1);

                            // Update query
                            $updateQuery = "UPDATE asukohad SET kesk_hinne = '$averageRatingRounded', hinnete_arv = '$ratingsCount' WHERE id = '$locationId'";
                            $yhendus->query($updateQuery);
                            ?>
                            <tr>
                                <td><a href="hinne.php?asukoht=<?php echo urlencode($locationId); ?>"><?php echo $row["nimi"]; ?></a></td>
                                <td><?php echo $row["asukoht"]; ?></td>
                                <td><?php echo $averageRatingRounded; ?></td>
                                <td><?php echo $ratingsCount; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?leht=<?php echo $page - 1; ?>&otsi=<?php echo urlencode($searchTerm); ?>">&lt; Eelmine lk</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?leht=<?php echo $page + 1; ?>&otsi=<?php echo urlencode($searchTerm); ?>">Järgmine lk &gt;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
    </div>
</body>
</html>