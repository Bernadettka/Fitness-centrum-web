<?php
require_once "../admin/auth.php";
require_once "../databaza/db.php";
require_once "klient.php";

$db = new Database();
$pdo = $db->pripojit_k_databaze();
$klientClass = new Klient($pdo);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $klientClass->delete($id);
}

header("Location: ../admin/admin.php");
exit;
