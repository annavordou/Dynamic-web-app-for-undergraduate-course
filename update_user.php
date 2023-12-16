<?php
require 'check_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'db_connection.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name = '$name', surname = '$surname', password = '$password', role = '$role' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: users.php");
    } else {
        echo "Σφάλμα κατά την ενημέρωση: " . $conn->error;
    }

    $conn->close();
}