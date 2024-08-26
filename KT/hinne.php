<?php
include ("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (isset($_GET['asukoht'])) {
    $selectedasukohtId = $_GET['asukoht'];
    $result = $yhendus->query("SELECT nimi FROM asukohad WHERE id = $selectedasukohtId");
    $row = $result->fetch_assoc();
}
?>
<?php
                    if (!empty($_POST['nimi']) && !empty($_POST['comment']) && !empty($_POST['hinnang'])) {
                        $nimi = $_POST['nimi'];
                        $comment = $_POST['comment'];
                        $hinnang = $_POST['hinnang'];

                        $stmt = $yhendus->query("INSERT INTO hinnangud (nimi, comment, hinnang, asukoht_id) VALUES ('$nimi', '$comment', '$hinnang', '$selectedasukohtId')");

                        if($stmt){
                            echo '<div class="alert alert-success mt-3" role="alert">Hinne on edukalt lisatud.</div>'; 
                            header("Location: index.php");
                            die;
                        } else {
                            echo '<div class="alert alert-danger mt-3" role="alert">EI SAA</div>';
                        }
                    }
                ?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa hinnang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .body {
            background-color: #f8f9fa;
        }
        .star [type="radio"] {
            appearance: none;
        }
        .star label:has(~ :checked) {
            color: DarkOrange;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
            <h1 class="mt-4 text-center"><?php echo htmlspecialchars($row['nimi']); ?></h1>
                <hr>
                <button class="btn btn-primary mb-3" onclick="window.location.href='index.php'">Tagasi</button>
                <form method="post">
                    <div class="mb-3">
                        <label for="nimi" class="form-label">Nimi:</label>
                        <input type="text" name="nimi" id="nimi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Kommentaar:</label>
                        <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
                    </div>
                    <label>Hinnang:</label>
                    <div class="star mb-3">
                        <p>
                            <label for="hinnang1"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang1" value="1" required>
                            <label for="hinnang2"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang2" value="2">
                            <label for="hinnang3"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang3" value="3">
                            <label for="hinnang4"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang4" value="4">
                            <label for="hinnang5"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang5" value="5">
                            <label for="hinnang6"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang6" value="6">
                            <label for="hinnang7"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang7" value="7">
                            <label for="hinnang8"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang8" value="8">
                            <label for="hinnang9"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang9" value="9">
                            <label for="hinnang10"><i class="fa fa-star"></i></label>
                            <input type="radio" name="hinnang" id="hinnang10" value="10">
                        </p>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary" value="hinda">
                    </div>
                </form>

                

                <hr>
                <h2 class="mt-4 text-center">Teised Hinded</h2>
                <?php
                $result = $yhendus->query("SELECT * FROM hinnangud WHERE asukoht_id = $selectedasukohtId");
                

                if ($result-> num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="review-card card">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($row["nimi"]) . ' - ' . htmlspecialchars($row["hinnang"]) . '/10</h5>';
                        echo '<p class="card-text">' . htmlspecialchars($row["comment"]) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="alert alert-info" role="alert">Hinnanguid ei leitud.</div>';
                }
                ?>

            </div>
        </div>
    </div>
    <script>
    function changeColor(radio) {
        var stars = document.querySelectorAll('.star');
        stars.forEach(function(star) {
            star.classList.remove('checked');
        });
        radio.classList.add('checked');
    }
</script>

</body>
</html>
