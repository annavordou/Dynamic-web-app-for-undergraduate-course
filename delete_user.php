<?php
require 'db_connection.php';

// Παίρνουμε το id του χρήστη που θέλουμε να διαγράψουμε από το URL
$user_id = $_GET['id'];

// Διαγραφή του χρήστη
$sql = "DELETE FROM users WHERE id = $user_id";
if ($conn->query($sql) === TRUE) {
    echo "Ο χρήστης διαγράφηκε επιτυχώς.";
} else {
    echo "Σφάλμα κατά τη διαγραφή του χρήστη: " . $conn->error;
}

$conn->close();

// Ανακατεύθυνση στη σελίδα "users" μετά τη διαγραφή
header("Location: users.php");
exit();
?>
