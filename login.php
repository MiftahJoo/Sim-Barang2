<?php
session_start();

// Data akun menggunakan Array Asosiatif
$akun = [
    "admin" => [
        "password" => "admin123",
        "role" => "admin"
    ],
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isset($akun[$username]) &&
        $akun[$username]["password"] === $password) {

        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;

        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
    <section>
        <h2>Login SIM-Barang</h2>

        <?php if ($error !== ""): ?>
            <p style="color:red;">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </section>
</main>

</body>
</html>