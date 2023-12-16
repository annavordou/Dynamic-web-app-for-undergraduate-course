<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sender = $_POST['Αποστολέας'];
    $subject = $_POST['Θέμα'];
    $message = $_POST['Κείμενο'];

    require 'db_connection.php';
    require 'vendor/autoload.php';

    $mail = new PHPMailer;

    // Ρυθμίσεις SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'annoula.vordou@gmail.com';
    $mail->Password = 'zqzrpmejizgikzry';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Fetch mail addresses from the database
    session_start();
    $role = $_SESSION['role'] ?? "";
    $mails = array();
    if ($role == "Tutor") {
        $query = "SELECT loginname FROM users WHERE role = 'Student'";
    } elseif ($role == "Student") {
        $query = "SELECT loginname FROM users WHERE role = 'Tutor'";
    }
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mails[] = $row['loginname'];
        }
    }

    // Send emails to tutors
    foreach ($mails as $current_mail) {
        $mail->setFrom($sender);
        $mail->addAddress($current_mail);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if(!$mail->send()) {
            echo 'Υπήρξε κάποιο σφάλμα κατά την αποστολή του μηνύματος.';
        } else {
            echo 'Το μήνυμα εστάλη με επιτυχία.';
        }
    }

    $conn->close();
    header("Location: communication.php?success=1");
}