<?php

session_start();

require_once "../databaza/db.php";

$databaza = new Database();
$pdo = $databaza->pripojit_k_databaze();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $meno = trim($_POST["meno"]);
    $heslo = $_POST["heslo"];

    if (empty($meno) || empty($heslo)) {

        $error = "Vyplň všetky polia.";
    } else {

        $sql = "SELECT * FROM admin WHERE meno = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$meno]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($heslo, $admin["heslo"])) {

            session_regenerate_id(true);

            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_meno"] = $admin["meno"];

            header("Location: admin.php");
            exit;
        } else {

            $error = "Nesprávne meno alebo heslo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark">

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-4">

                <div class="card p-4 shadow">

                    <h2 class="text-center mb-4">
                        Admin Login
                    </h2>

                    <?php if ($error): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                Meno
                            </label>

                            <input
                                type="text"
                                name="meno"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Heslo
                            </label>

                            <input
                                type="password"
                                name="heslo"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">
                            Prihlásiť sa
                        </button>

                    </form>
                    <a class="button-container" href="../webstranka/index.php" role="button">späť na Iron Gym</a>

                </div>

            </div>
        </div>

    </div>

</body>

</html>