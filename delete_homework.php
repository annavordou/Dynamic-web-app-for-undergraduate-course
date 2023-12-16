<?php
require 'db_connection.php';

// Παίρνουμε το id της εργασίας που θέλουμε να διαγράψουμε από το URL
$homework_id = $_GET['id'];

$select_sql = "SELECT path FROM homework WHERE id = $homework_id";
$result = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($result);

// Διαγραφή αρχείου από τον φάκελο
$file_path = $row['path'];
if (file_exists($file_path)) {
    unlink($file_path);
}

// Διαγραφή των σχετικών γραμμών από τον πίνακα "requirements"
$deleteRequirementsSQL = "DELETE FROM requirements WHERE homework_id = $homework_id";
if ($conn->query($deleteRequirementsSQL) === FALSE) {
    echo "Σφάλμα κατά τη διαγραφή των παραδοτέων: " . $conn->error;
}

// Διαγραφή των σχετικών γραμμών από τον πίνακα "goals"
$deleteGoalsSQL = "DELETE FROM goals WHERE homework_id = $homework_id";
if ($conn->query($deleteGoalsSQL) === FALSE) {
    echo "Σφάλμα κατά τη διαγραφή των στόχων: " . $conn->error;
}

// Διαγραφή της εργασίας
$sql = "DELETE FROM homework WHERE id = $homework_id";
if ($conn->query($sql) === TRUE) {
    echo "Η εργασία διαγράφηκε επιτυχώς.";
} else {
    echo "Σφάλμα κατά τη διαγραφή της εργασίας: " . $conn->error;
}

$conn->close();

// Ανακατεύθυνση μετά τη διαγραφή
header("Location: homework.php");
exit();