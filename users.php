<?php require 'check_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Χρήστες</title>
</head>
<body>
<div id="top"></div>
<div class="container">
    <div class="title">
        <h1>Χρήστες</h1>
    </div>
    <?php require 'header.php';?>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div>
                <a href="add_user.php" class="add-button">+ Προσθήκη νέου χρήστη</a>
            </div>
            <br>
            <?php
            require 'db_connection.php';

            $sql = "SELECT * FROM users";
            $users = mysqli_query($conn, $sql);
            if ($users->num_rows > 0) {
                // Υπάρχουν χρήστες στη βάση
                while ($row = $users->fetch_assoc()) {
                    echo "<div class='user'>";
                    echo "<p><b>Όνομα:</b> " . $row['name'] . "</p>";
                    echo "<p><b>Επίθετο:</b> " . $row['surname'] . "</p>";
                    echo "<p><b>Mail:</b> " . $row['loginname'] . "</p>";
                    echo "<p><b>Ρόλος:</b> " . $row['role'] . "</p>";
                    echo "<div class='actions-container'>";
                    echo "<div class='actions'>";
                    echo "<a href='edit_user.php?id=" . $row['id'] . "'>Επεξεργασία</a>";
                    echo "<a href='delete_user.php?id=" . $row['id'] . "' onclick=\"return confirm('Είστε βέβαιος/βεβαία ότι θέλετε να διαγράψετε τον χρήστη;')\">Διαγραφή</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Δεν υπάρχουν χρήστες.";
            }
            ?>

        </div>
    </div>
</div>
<input type="checkbox" id="top-checkbox">
<label for="top-checkbox" id="top-button">&#8593; Top</label>
<script src="scripts.js"></script>
</body>
</html>
