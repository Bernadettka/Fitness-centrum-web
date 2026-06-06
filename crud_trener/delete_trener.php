<?php
require_once "../databaza/db.php";
require_once "../crud_trener/trener.php";

$db = new Database();
$pdo = $db->pripojit_k_databaze();
$trenerClass = new Trener($pdo);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $trenerClass->delete($id);
}

header("Location: ../admin/admin.php");
exit;
