<?php
require_once "../admin/auth.php";
require_once "../databaza/db.php";
require_once "../crud_trener/trener.php";

$db = new Database();
$pdo = $db->pripojit_k_databaze();
$trenerClass = new Trener($pdo);


if (!isset($_GET["id"])) {
    header("Location: ../admin/admin.php");
    exit;
}

$id = $_GET["id"];
$trener = $trenerClass->getById($id);

if (!$trener) {
    header("Location: ../admin/admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE treneri 
            SET meno = ?, opis = ?, obrazok = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST["meno"],
        $_POST["opis"],
        $_POST["obrazok"],
        $id
    ]);

    header("Location: ../admin/admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <title>Upraviť trénera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h2>Upraviť trénera</h2>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Meno</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="meno" value="<?= htmlspecialchars($trener["meno"]) ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Obrázok</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="obrazok" value="<?= htmlspecialchars($trener["obrazok"]) ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Opis</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="opis" rows="4"><?= htmlspecialchars($trener["opis"]) ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
                    <a href="../admin/admin.php" class="btn btn-secondary">Späť</a>
                </div>
            </div>

        </form>
    </div>

</body>

</html>