<?php
require_once "../databaza/db.php";

$db = new databaza();
$pdo = $db->pripojit_k_databaze();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM treneri WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: ../admin/admin.php");
exit;
