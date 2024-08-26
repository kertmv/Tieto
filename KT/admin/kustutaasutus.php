<?php
include ("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login");
    exit;
}

if(isset($_GET['id'])) {
    $valitudkohtid = $_GET['id'];
    $valitudkohtparing = "SELECT nimi FROM asukohad WHERE id = '$valitudkohtid'";
    $valitud_koht = $yhendus -> query($valitudkohtparing);
    $row = mysqli_fetch_assoc($valitud_koht);

    $sqlKustutaAsutus = "DELETE FROM asukohad WHERE id = '$valitudkohtid'";
    if ($yhendus -> query($sqlKustutaAsutus) === TRUE) {
        header("Location: /php/KT/admin/");
        exit;
    } else {
        echo "Viga kustutamisel " . $yhendus -> error;
    }
} else {
    header("Location: /php/KT/admin/");
}

$yhendus->close(); ?>
