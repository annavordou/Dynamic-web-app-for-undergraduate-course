<?php
require 'check_connection.php';
require 'db_connection.php';

$title = $_POST['title'];
$date = $_POST['date'];

$targetDir = "uploads/homework/"; // Φάκελος αποθήκευσης αρχείων
require 'file_setup.php';

if ($uploadOk == 0) {
    echo "Συγγνώμη, το αρχείο δεν ανέβηκε.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "Το αρχείο " . basename($_FILES["file"]["name"]) . " ανέβηκε με επιτυχία.";
        $sql = "INSERT INTO homework (title, date, path) 
        VALUES ('$title', '$date', '$targetFile')";
        if ($conn->query($sql) === TRUE) {
            $homework_id = $conn->insert_id; // ID της νέας εγγραφής

            // Εισαγωγή στόχων
            if (!empty($_POST['goals'])) {
                $goals = $_POST['goals'];
                foreach ($goals as $goal) {
                    $goal = mysqli_real_escape_string($conn, $goal);
                    $goal_sql = "INSERT INTO goals (homework_id, goal) VALUES ('$homework_id', '$goal')";
                    $conn->query($goal_sql);
                }
            }

            // Εισαγωγή παραδοτέων
            if (!empty($_POST['requirements'])) {
                $requirements = $_POST['requirements'];
                foreach ($requirements as $requirement) {
                    $requirement = mysqli_real_escape_string($conn, $requirement);
                    $requirement_sql = "INSERT INTO requirements (homework_id, requirement) VALUES ('$homework_id', '$requirement')";
                    $conn->query($requirement_sql);
                }
            }
            header("Location: homework.php");
        } else {
            echo "Σφάλμα κατά την προσθήκη εργασίας: " . $conn->error;
        }
    } else {
        echo "Συγγνώμη, υπήρξε ένα πρόβλημα κατά τη μεταφόρτωση του αρχείου.";
    }
}

$conn->close();