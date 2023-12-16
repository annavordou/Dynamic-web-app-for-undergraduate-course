<?php
$name = $_SESSION['name'] ?? "";
$surname = $_SESSION['surname'] ?? "";

echo '<div class="header">';
if (isset($_SESSION['username'])) {
    echo "<span class='welcome-message'> Συνδέθηκες ως " . $name . " " . $surname . ".</span> <a href='logout.php' class='logout-button'>Αποσύνδεση</a>";
} else {
    echo "<a href='login.php'>Σύνδεση</a>";
}
echo "</div>";