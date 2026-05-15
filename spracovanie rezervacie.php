<?php
require_once 'db.php';
require_once 'booking.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required = ["meno", "priezvisko", "email", "tel", "trener", "stupen"];

    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            header("Location: rezervacia.php?status=error#formular");
            exit();
        }
    }

    $databaza = new databaza();
    $db = $databaza->pripojit_k_databaze();

    $booking = new booking($db);
    $result = $booking->zapisat_data($_POST);

    if ($result === true) {
        header("Location: rezervacia.php?status=success#formular");
        exit();
    } else {
        echo "Chyba: " . $result;
    }
}
