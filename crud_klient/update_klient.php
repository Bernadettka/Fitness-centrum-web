<?php
require_once "../admin/auth.php";
require_once "../databaza/db.php";
require_once "klient.php";

$db = new Database();
$pdo = $db->pripojit_k_databaze();
$klientClass = new Klient($pdo);

if (!isset($_GET["id"])) {
    header("Location: ../admin/admin.php");
    exit;
}

$id = $_GET["id"];
$rezervacia = $klientClass->getById($id);

if (!$rezervacia) {
    header("Location: ../admin/admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klientClass->update(
        $id,
        $_POST["meno"],
        $_POST["priezvisko"],
        $_POST["email"],
        $_POST["tel"],
        $_POST["trener"],
        $_POST["sprava"],
        $_POST["stupen"]
    );

    header("Location: ../admin/admin.php");
    exit;
}

$fields = [
    "meno" => "Meno",
    "priezvisko" => "Priezvisko",
    "email" => "Email",
    "tel" => "Telefón"
];

$treneri = ["Marek Kováč", "Tomáš Urban", "Petra Bohová", "Lukáš Bielik"];
$stupne = ["začiatočník", "pokročilý", "profesionál"];
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <title>Upraviť klienta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
        <h2>Upraviť klienta</h2>

        <form method="post">

            <?php foreach ($fields as $name => $label): ?>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label"><?= $label ?></label>
                    <div class="col-sm-6">
                        <input
                            type="text"
                            class="form-control"
                            name="<?= $name ?>"
                            value="<?= htmlspecialchars($rezervacia[$name]) ?>">
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tréner</label>
                <div class="col-sm-6">
                    <select class="form-control" name="trener">
                        <?php foreach ($treneri as $trener): ?>
                            <option value="<?= $trener ?>" <?= $rezervacia["trener"] == $trener ? "selected" : "" ?>>
                                <?= $trener ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Správa</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="sprava" rows="4"><?= htmlspecialchars($rezervacia["sprava"]) ?></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stupeň</label>
                <div class="col-sm-6">
                    <select class="form-control" name="stupen">
                        <?php foreach ($stupne as $stupen): ?>
                            <option value="<?= $stupen ?>" <?= $rezervacia["stupen"] == $stupen ? "selected" : "" ?>>
                                <?= $stupen ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
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