<?php require 'check_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Επικοινωνία</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Επικοινωνία</h1>
    </div>
    <?php require 'header.php'; ?>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="communication-section">
                <p>Η συγκεκριμένη ιστοσελίδα θα περιέχει δύο δυνατότητες για την αποστολή e-mail
                    <?php
                    if ($role == "Tutor") {
                        echo "στους φοιτητές";
                    } elseif ($role == "Student") {
                        echo "στους καθηγητές";
                    }
                    ?>:</p>

                <ul>
                    <li>Μέσω web φόρμας</li>
                    <li>Με χρήση e-mail διεύθυνσης</li>
                </ul>
            </div>
            <div class="communication">
                <h2>Αποστολή e-mail μέσω web φόρμας</h2>
                <form action="send_mail.php" method="POST">
                    <label for="sender">Αποστολέας:</label>
                    <input type="text" id="sender" name="Αποστολέας" required>
                    <br>
                    <label for="subject">Θέμα:</label>
                    <input type="text" id="subject" name="Θέμα" required>
                    <br>
                    <label for="message">Κείμενο:</label>
                    <textarea id="message" name="Κείμενο" rows="5" required></textarea>
                    <br>
                    <input type="submit" value="Αποστολή">
                </form>
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo '<p class="success-message">Το μήνυμα εστάλη με επιτυχία.</p>';
                }
                ?>
            </div>
            <div class="communication">
                <h2>Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου
                    <a href="https://webmail.auth.gr/login.php" target="_blank">webmail.auth.gr</a>
                    χρησιμοποιώντας κάποιο από τα παρακάτω mails:</p>
                <ol>
                    <?php
                    require 'db_connection.php';

                    if ($role == "Tutor") {
                        $sql = "SELECT * FROM users WHERE role = 'Student'";
                    } elseif ($role == "Student") {
                        $sql = "SELECT * FROM users WHERE role = 'Tutor'";
                    }
                    $tutors = mysqli_query($conn, $sql);
                    if ($tutors->num_rows > 0) {
                        while ($row = $tutors->fetch_assoc()){
                            echo "<li>". $row['surname'] ." " . $row['name'] . ": " . $row['loginname'] ."</li>";
                        }
                    } else {
                        echo "Δεν υπάρχουν χρήστες.";
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
</div>
</body>
</html>