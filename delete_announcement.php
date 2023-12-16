<?php
require 'db_connection.php';

// Παίρνουμε το id της ανακοίνωσης που θέλουμε να διαγράψουμε από το URL
$announcement_id = $_GET['id'];

// Διαγραφή του χρήστη
$sql = "DELETE FROM announcements WHERE id = $announcement_id";
if ($conn->query($sql) === TRUE) {
    echo "Η ανακοίνωση διαγράφηκε επιτυχώς.";
} else {
    echo "Σφάλμα κατά τη διαγραφή της ανακοίνωσης: " . $conn->error;
}

$conn->close();

// Ανακατεύθυνση μετά τη διαγραφή
header("Location: announcement.php");
exit();