<?php
$kasutaja = "kvare";
$dbserver = "localhost";
$andmebaas ="tieto";
$passwd = "parool";

$yhendus = mysqli_connect ($dbserver, $kasutaja, $passwd, $andmebaas);

if (!$yhendus) {
    die("Viga: " . $yhendus->connect_error);
}
?>
