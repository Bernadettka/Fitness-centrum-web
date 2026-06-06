<?php

require_once '../databaza/db.php';
require_once '../webstranka/booking.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $required = ["meno", "priezvisko", "email", "tel", "trener", "stupen"];

    foreach ($required as $field) {

        if (empty($_POST[$field])) {

            header("Location: rezervacia.php?status=error#formular");
            exit();
        }
    }

    // TRIM
    $meno = trim($_POST["meno"]);
    $priezvisko = trim($_POST["priezvisko"]);
    $email = trim($_POST["email"]);
    $tel = trim($_POST["tel"]);
    $trener = $_POST["trener"];
    $stupen = $_POST["stupen"];
    $sprava = trim($_POST["sprava"]);

    $errors = [];

    // EMAIL VALIDÁCIA
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Neplatný email.";
    }

    // TELEFÓN VALIDÁCIA
    if (!preg_match('/^[0-9+ ]+$/', $tel)) {
        $errors[] = "Neplatné telefónne číslo.";
    }

    // DLŽKA MENA
    if (strlen($meno) > 50) {
        $errors[] = "Meno je príliš dlhé.";
    }

    // DLŽKA PRIEZVISKA
    if (strlen($priezvisko) > 50) {
        $errors[] = "Priezvisko je príliš dlhé.";
    }

    // DLŽKA SPRÁVY
    if (strlen($sprava) > 500) {
        $errors[] = "Správa je príliš dlhá.";
    }

    $errorMessage = urlencode(implode("<br>", $errors));
    header("Location: rezervacia.php?status=error&message=$errorMessage#formular");
    exit();
}

$databaza = new Database();
$db = $databaza->pripojit_k_databaze();

$booking = new Booking($db);

$result = $booking->zapisat_data($_POST);

if ($result === true) {

    header("Location: rezervacia.php?status=success#formular");
    exit();
} else {

    echo "Chyba: " . htmlspecialchars($result);
}
