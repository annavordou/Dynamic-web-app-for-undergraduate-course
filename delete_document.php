<?php
require 'db_connection.php';

// Παίρνουμε το id του εγγράφου που θέλουμε να διαγράψουμε από το URL
$doc_id = $_GET['id'];

$select_sql = "SELECT path FROM documents WHERE id = $doc_id";
$result = mysqli_query($conn, $select_sql);
$row = mysqli_fetch_assoc($result);

// Διαγραφή αρχείου από τον φάκελο
$file_path = $row['path'];
if (file_exists($file_path)) {
    unlink($file_path);
}

// Διαγραφή του εγγράφου
$sql = "DELETE FROM documents WHERE id = $doc_id";
if ($conn->query($sql) === TRUE) {
    echo "Το έγγραφο διαγράφηκε επιτυχώς.";
} else {
    echo "Σφάλμα κατά τη διαγραφή του εγγράφου: " . $conn->error;
}

$conn->close();

// Ανακατεύθυνση μετά τη διαγραφή
header("Location: documents.php");
exit();