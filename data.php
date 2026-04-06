<?php
if ($_POST) {

    $meno = $_POST["demo-name"];
    $priezvisko = $_POST["demo-lastname"];
    $email = $_POST["demo-email"];
    $telefon = $_POST["demo-telcislo"];
    $trener = $_POST["demo-category"];
    $uroven = $_POST["demo-priority"];
    $sprava = $_POST["demo-message"];

    echo "<h1>Rezervácia prijatá</h1>";

    echo "Meno: " . $meno . "<br>";
    echo "Priezvisko: " . $priezvisko . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Telefón: " . $telefon . "<br>";
    echo "Tréner: " . $trener . "<br>";
    echo "Úroveň: " . $uroven . "<br>";
    echo "Správa: " . $sprava . "<br>";
}
?>