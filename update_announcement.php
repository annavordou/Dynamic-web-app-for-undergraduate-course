<?php
require 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connection.php';

    $id = $_POST['id'];
    $date = $_POST['date'];
    $theme = $_POST['theme'];
    $body = $_POST['body'];

    $sql = "UPDATE announcements SET date = '$date', theme = '$theme', body = '$body' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: announcement.php");
    } else {
        echo "Σφάλμα κατά την ενημέρωση: " . $conn->error;
    }

    $conn->close();
}