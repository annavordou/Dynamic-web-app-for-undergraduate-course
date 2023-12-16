<?php
require 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connection.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];

    if ($_FILES["file"]["error"] !== UPLOAD_ERR_NO_FILE) {
        // Κώδικας για το ανέβασμα του νέου αρχείου και ενημέρωση του μονοπατιού στη βάση
        $targetDir = "uploads/homework/"; // Φάκελος αποθήκευσης αρχείων
        require 'file_setup.php';

        if ($uploadOk == 0) {
            echo "Συγγνώμη, το αρχείο δεν ανέβηκε.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo "Το αρχείο " . basename($_FILES["file"]["name"]) . " ανέβηκε με επιτυχία.";
                $sql = "UPDATE homework SET title = '$title', date = '$date', path = '$targetFile' WHERE id = $id";

                // Διαγραφή παλιού αρχείου από τον φάκελο
                $select_sql = "SELECT path FROM homework WHERE id = $id";
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
        $sql = "UPDATE homework SET title = '$title', date = '$date' WHERE id = $id";
    }

    // Ενημέρωση στόχων
    $goals = $_POST['goals'];
    $goal_ids = $_POST['goal_id'];
    foreach ($goals as $index => $goal) {
        $goal_id = $goal_ids[$index];
        $updateGoalSql = "UPDATE goals SET goal = '$goal' WHERE id = $goal_id";
        if ($conn->query($updateGoalSql) === FALSE) {
            echo "Σφάλμα κατά την ενημέρωση στόχου: " . $conn->error;
        }
    }

    // Ενημέρωση παραδοτέων
    $requirements = $_POST['requirements'];
    $req_ids = $_POST['req_id'];
    foreach ($requirements as $index => $requirement) {
        $req_id = $req_ids[$index];
        $updateReqSql = "UPDATE requirements SET requirement = '$requirement' WHERE id = $req_id";
        if ($conn->query($updateReqSql) === FALSE) {
            echo "Σφάλμα κατά την ενημέρωση παραδοτέου: " . $conn->error;
        }
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: homework.php");
    } else {
        echo "Σφάλμα κατά την ενημέρωση: " . $conn->error;
    }

    $conn->close();
}