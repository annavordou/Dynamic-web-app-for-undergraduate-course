<?php
$role = $_SESSION['role'] ?? "";

echo '<div class="menu">';
echo '<a href="index.php">Αρχική σελίδα</a>';
echo '<a href="announcement.php">Ανακοινώσεις</a>';
echo '<a href="communication.php">Επικοινωνία</a>';
echo '<a href="documents.php">Έγγραφα μαθήματος</a>';
echo '<a href="homework.php">Εργασίες</a>';
if ($role == "Tutor") {
    echo '<a href="users.php">Χρήστες</a>';
}
echo '</div>';