<?php
require 'check_connection.php';
require 'db_connection.php';

$date = $_POST['date'];
$theme = $_POST['theme'];
$body = $_POST['body'];

$sql = "INSERT INTO announcements (date, theme, body) 
        VALUES ('$date', '$theme', '$body')";
if ($conn->query($sql) === TRUE) {
    header("Location: announcement.php");
} else {
    echo "Σφάλμα κατά την προσθήκη ανακοίνωσης: " . $conn->error;
}

$conn->close();