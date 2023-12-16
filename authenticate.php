<?php
require 'db_connection.php';

// Λήψη των δεδομένων που παραδόθηκαν από τη φόρμα
$username = $_POST['username'];
$password = $_POST['password'];

// Ερώτημα SQL για τον έλεγχο των διαπιστευτηρίων
$sql = "SELECT * FROM users WHERE loginname = '$username' AND password = '$password'";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    // Ο χρήστης είναι έγκυρος
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['db_connection'] = $conn;
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $row['name'];
    $_SESSION['surname'] = $row['surname'];
    $_SESSION['role'] = $row['role'];

    header("Location: index.php"); // Ανακατεύθυνση στην αρχική σελίδα μετά τη σύνδεση
} else {
    // Λάθος στοιχεία σύνδεσης
    header("Location: login.php?error=1"); // Επιστροφή στη σελίδα σύνδεσης με μήνυμα λάθους
}

$conn->close();