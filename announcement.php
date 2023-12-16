<?php require 'check_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ανακοινώσεις</title>
</head>
<body>
<div id="top"></div>
<div class="container">
    <div class="title">
        <h1>Ανακοινώσεις</h1>
    </div>
    <?php require 'header.php';?>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <?php
            if ($role == "Tutor") {
                echo "<div>";
                echo '<a href="add_announcement.php" class="add-button">+ Προσθήκη νέας ανακοίνωσης</a>';
                echo "</div>";
                echo "<br>";
            }

            require 'db_connection.php';

            $sql = "SELECT * FROM announcements";
            $announcements = mysqli_query($conn, $sql);
            if ($announcements->num_rows > 0) {
                // Υπάρχουν ανακοινώσεις στη βάση
                $count = 1;
                while ($row = $announcements->fetch_assoc()) {
                    echo "<div class='announcement'>";
                    echo "<h2>Ανακοίνωση " . $count . "</h2>";
                    echo "<p><b>Ημερομηνία:</b> " . $row['date'] . "</p>";
                    echo "<p><b>Θέμα:</b> " . $row['theme'] . "</p>";
                    echo "<p>" . $row['body'] . "</p>";
                    if ($role == "Tutor") {
                        echo "<div class='actions-container'>";
                        echo "<div class='actions'>";
                        echo "<a href='edit_announcement.php?id=" . $row['id'] . "'>Επεξεργασία</a>";
                        echo "<a href='delete_announcement.php?id=" . $row['id'] . "' onclick=\"return confirm('Είστε βέβαιος/βεβαία ότι θέλετε να διαγράψετε την ανακοίνωση;')\">Διαγραφή</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                    $count += 1;
                }
            } else {
                echo "Δεν υπάρχουν ανακοινώσεις.";
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