<?php
require_once "db.php";

$databaza = new databaza();
$pdo = $databaza->pripojit_k_databaze();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $meno = $_POST["meno"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    if (!empty($meno) && !empty($email)) {

        $sql = "INSERT INTO rezervacie (meno, email, tel) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$meno, $email, $tel]);

        header("Location: admin.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Iron Gym</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<?php
require_once "db.php";

$databaza = new databaza();
$pdo = $databaza->pripojit_k_databaze();

$sql = "SELECT * FROM rezervacie ORDER BY id DESC";
$stmt = $pdo->query($sql);
$rezervacie = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="container my-5">
        <h1> Spracovanie klienov</h1>
        <a class="btn btn-primary" href="create.php" role="button">nový klient</a>
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
                            <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $rezervacia['id'] ?>">Upraviť</a>
                            <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $rezervacia['id'] ?>">Vymazať</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</html>