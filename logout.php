<?php
session_start();
session_unset(); // Καθαρίζει όλα τα session data
session_destroy(); // Καταστρέφει το session

header("Location: login.php"); // Ανακατεύθυνση στην αρχική σελίδα μετά την αποσύνδεση