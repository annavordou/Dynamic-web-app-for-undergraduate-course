<?php
require 'check_connection.php';
require 'db_connection.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$loginname = $_POST['loginname'];
$password = $_POST['password'];
$role = $_POST['role'];

$check_sql = "SELECT id FROM users WHERE loginname = '$loginname'";
$result = mysqli_query($conn, $check_sql);
if ($result->num_rows > 0) {
    $error_message = "Το mail χρήστη δεν είναι διαθέσιμο. Παρακαλώ επιλέξτε ένα άλλο.";
    header("Location: add_user.php?error_message=" . urlencode($error_message));
} else {
    $sql = "INSERT INTO users (name, surname, loginname, password, role) 
            VALUES ('$name', '$surname', '$loginname', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        header("Location: users.php"); // Επιστροφή στη σελίδα των χρηστών
    } else {
        echo "Σφάλμα κατά την προσθήκη χρήστη: " . $conn->error;
    }
}

$conn->close();