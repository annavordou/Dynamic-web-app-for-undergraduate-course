<?php
// Σύνδεση στη βάση δεδομένων
$servername = "webpagesdb.it.auth.gr:3306";
$username = "annavor";
$password = "12345";
$dbname = "student3647partB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Σφάλμα κατά τη σύνδεση στη βάση δεδομένων: " . $conn->connect_error);
}