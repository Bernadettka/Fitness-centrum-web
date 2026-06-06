<?php
require_once "../admin/auth.php";
require_once "../databaza/db.php";
require_once "../webstranka/booking.php";
require_once "../crud_trener/trener.php";

$db = new database();
$pdo = $db->pripojit_k_databaze();
$booking = new Booking($pdo);
$trenerClass = new Trener($pdo);
$treneri = $trenerClass->getAll();
$vybranyTrener = $_GET["trener"] ?? "";
$chyba = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meno = $_POST["meno"];
    $priezvisko = $_POST["priezvisko"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $trener = $_POST["trener"];
    $sprava = $_POST["sprava"];
    $stupen = $_POST["stupen"];

    if (empty($meno) || empty($priezvisko) || empty($email) || empty($tel)) {
        $chyba = "Vyplň všetky povinné polia.";
    } else {
        $booking->zapisat_data([
            "meno" => $meno,
            "priezvisko" => $priezvisko,
            "email" => $email,
            "tel" => $tel,
            "trener" => $trener,
            "sprava" => $sprava,
            "stupen" => $stupen
        ]);
        header("Location: ../admin/admin.php");
        exit;
    }
}

$fields = [
    "meno" => "Meno",
    "priezvisko" => "Priezvisko",
    "email" => "Email",
    "tel" => "Telefón"
];
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nový klient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>Nový klient</h2>

        <?php if (!empty($chyba)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($chyba) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <?php foreach ($fields as $name => $label): ?>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"><?= $label ?></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="<?= $name ?>" value="">
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tréner</label>
                <div class="col-sm-6">
                    <select class="form-control" name="trener" id="trener" required>
                        <?php foreach ($treneri as $trener): ?>

                            <option value="<?= $trener['id'] ?>">
                                <?= htmlspecialchars($trener['meno']) ?>
                            </option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Správa</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="sprava" rows="4"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stupeň</label>
                <div class="col-sm-6">
                    <select class="form-control" name="stupen">
                        <option value="začiatočník">Začiatočník</option>
                        <option value="pokročilý">Pokročilý</option>
                        <option value="profesionál">Profesionál</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Uložiť</button>
                    <a href="../admin/admin.php" class="btn btn-secondary">Späť</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>