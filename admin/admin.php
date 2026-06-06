<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

require_once "../databaza/db.php";
require_once "../crud_trener/trener.php";
require_once "../crud_klient/klient.php";

$databaza = new Database();
$pdo = $databaza->pripojit_k_databaze();

$trenerClass = new Trener($pdo);
$klientClass = new Klient($pdo);

$rezervacie = $klientClass->getAll();
$treneri = $trenerClass->getAll();
$pocetRezervacii = $klientClass->getPocetRezervacii();
$pocetTrenerov = $trenerClass->getPocetTrenerov();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Iron Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

</html>

<body>
    <div class="container my-5">
        <h1>Admin</h1>
        <button class="btn btn-primary" onclick="window.location.href='admin_logout.php'">Odhlásiť sa</button>
        <div class="container mt-4">
            <div class="row g-3 mb-4">

                <div class="col-auto">
                    <div class="card shadow-sm">
                        <div class="card-body text-center px-4">
                            <h6 class="text-muted">Počet rezervácií</h6>
                            <h3 class="mb-0"><?= $pocetRezervacii['pocet']; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="card shadow-sm">
                        <div class="card-body text-center px-4">
                            <h6 class="text-muted">Počet trénerov</h6>
                            <h3 class="mb-0"><?= $pocetTrenerov['pocet']; ?></h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <h2> Spracovanie klienov</h2>
        <a class="btn btn-primary" href="../crud_klient/create_klient.php" role="button">nový klient</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Email</th>
                    <th>Telefónne číslo</th>
                    <th>Tréner</th>
                    <th>Stupeň</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rezervacie as $rezervacia): ?>
                    <tr>
                        <td><?= htmlspecialchars($rezervacia["id"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["meno"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["priezvisko"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["email"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["tel"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["trener"]) ?></td>
                        <td><?= htmlspecialchars($rezervacia["stupen"]) ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="../crud_klient/update_klient.php?id=<?= $rezervacia['id'] ?>">Upraviť</a>
                            <a class="btn btn-danger btn-sm" href="../crud_klient/delete_klient.php?id=<?= $rezervacia['id'] ?>"
                                onclick="return confirm('Naozaj chcete odstrániť rezerváciu?')">Vymazať</a>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Vytváranie trénerov</h2>
        <a class="btn btn-primary mb-3" href="../crud_trener/create_trener.php">pridať nového trénera</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Opis</th>
                    <th>Obrázok</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($treneri as $trener): ?>
                    <tr>
                        <td><?= htmlspecialchars($trener["id"]) ?></td>
                        <td><?= htmlspecialchars($trener["meno"]) ?></td>
                        <td><?= htmlspecialchars($trener["opis"]) ?></td>
                        <td><?= htmlspecialchars($trener["obrazok"]) ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="../crud_trener/update_trener.php?id=<?= $trener['id'] ?>">Upraviť</a>
                            <a class="btn btn-danger btn-sm" href="../crud_trener/delete_trener.php?id=<?= $trener['id'] ?>"
                                onclick="return confirm('Naozaj chcete odstrániť rezerváciu?')">Vymazať</a>
                    </tr>
                <?php endforeach; ?>
</body>

</html>
