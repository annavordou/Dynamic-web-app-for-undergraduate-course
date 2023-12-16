<?php
require 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connection.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($_FILES["file"]["error"] !== UPLOAD_ERR_NO_FILE) {
        // Κώδικας για το ανέβασμα του νέου αρχείου και ενημέρωση του μονοπατιού στη βάση
        $targetDir = "uploads/documents/"; // Φάκελος αποθήκευσης αρχείων
        require 'file_setup.php';

        if ($uploadOk == 0) {
            echo "Συγγνώμη, το αρχείο δεν ανέβηκε.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "Το αρχείο " . basename($_FILES["file"]["name"]) . " ανέβηκε με επιτυχία.";
                $sql = "UPDATE documents SET title = '$title', description = '$description', path = '$targetFile' WHERE id = $id";

                // Διαγραφή παλιού αρχείου από τον φάκελο
                $select_sql = "SELECT path FROM documents WHERE id = $id";
                $result = mysqli_query($conn, $select_sql);
                $row = mysqli_fetch_assoc($result);
                $path = $row['path'];
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
    } else {
        // Κώδικας για ενημέρωση τίτλου και περιγραφής στη βάση χωρίς αντικατάσταση αρχείου
        $sql = "UPDATE documents SET title = '$title', description = '$description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: documents.php");
    } else {
        echo "Σφάλμα κατά την ενημέρωση: " . $conn->error;
    }


    $conn->close();
}