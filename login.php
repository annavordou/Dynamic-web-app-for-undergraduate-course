<?php
session_start();

$error_message = "";

if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error_message = "Λανθασμένα στοιχεία σύνδεσης.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
<div class="login-container">
    <div style="text-align: center;"><h1>Σύνδεση</h1></div>
    <br>
    <?php
    if (!empty($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>
    <br>
    <form action="authenticate.php" method="post">
        <label for="username">Όνομα χρήστη:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Κωδικός:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Είσοδος</button>
    </form>
</div>
</body>
</html>