<?php
require_once "../databaza/db.php";

$db = new databaza();
$pdo = $db->pripojit_k_databaze();

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
        $sql = "INSERT INTO rezervacie 
                (meno, priezvisko, email, tel, trener, sprava, stupen) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$meno, $priezvisko, $email, $tel, $trener, $sprava, $stupen]);

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
                    <select class="form-control" name="trener">
                        <option value="meno1">Marek Kováč</option>
                        <option value="meno2">Tomáš Urban</option>
                        <option value="meno3">Petra Bohová</option>
                        <option value="meno4">Lukáš Bielik</option>
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