<?php 
include("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /php/KT/login");
    exit;
}

if (isset($_GET['comment']) && isset($_GET['asukoht_id'])) {
    $valitudcomment = $_GET['comment'];
    $valitudId = $_GET['asukoht_id'];

    $stmt = $yhendus->prepare("DELETE FROM hinnangud WHERE comment = ? AND asukoht_id = ?");
    $stmt->bind_param("si", $valitudcomment, $valitudId);

    if ($stmt->execute()) {
        $stmt->close();
        $yhendus->close();
        header("Location: /php/KT/admin/lisahinnang.php?asukoht=$valitudId");
        exit;
    } else {
        echo "Viga hinnangu kustutamisel: " . $yhendus->error;
    }
} else {
    header("Location: /php/KT/");
    exit;
}
?>
