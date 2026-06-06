<?php
require_once "../databaza/db.php";
require_once "../crud_trener/trener.php";

$db = new Database();
$pdo = $db->pripojit_k_databaze();
$trenerClass = new Trener($pdo);


$chyba = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meno = $_POST["meno"];
    $opis = $_POST["opis"];
    $obrazok = $_POST["obrazok"];

    if (empty($meno) || empty($opis) || empty($obrazok)) {
        $chyba = "Vyplň všetky povinné polia.";
    } else {
        $trenerClass->create($meno, $opis, $obrazok);

        header("Location: ../admin/admin.php");
        exit;
    }
}

$fields = [
    "meno" => "Meno",
    "obrazok" => "Obrazok"
];
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nový Tréner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>Nový tréner</h2>

        <?php if (!empty($chyba)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($chyba) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Meno</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="meno" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Obrázok</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="obrazok" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Opis</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="opis" rows="4"></textarea>
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