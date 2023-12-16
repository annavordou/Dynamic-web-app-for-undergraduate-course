<?php
require 'check_connection.php';
require 'db_connection.php';

$title = $_POST['title'];
$description = $_POST['description'];

$targetDir = "uploads/documents/"; // Φάκελος αποθήκευσης αρχείων
require 'file_setup.php';

if ($uploadOk == 0) {
    echo "Συγγνώμη, το αρχείο δεν ανέβηκε.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "Το αρχείο " . basename($_FILES["file"]["name"]) . " ανέβηκε με επιτυχία.";
        $sql = "INSERT INTO documents (title, description, path) 
        VALUES ('$title', '$description', '$targetFile')";
        if ($conn->query($sql) === TRUE) {
            header("Location: documents.php");
        } else {
            echo "Σφάλμα κατά την προσθήκη εγγράφου: " . $conn->error;
        }
    } else {
        echo "Συγγνώμη, υπήρξε ένα πρόβλημα κατά τη μεταφόρτωση του αρχείου.";
    }
}

$conn->close();