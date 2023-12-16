<?php require 'check_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Έγγραφα μαθήματος</title>
</head>
<body>
<div id="top"></div>
<div class="container">
    <div class="title">
        <h1>Έγγραφα μαθήματος</h1>
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
                echo '<a href="add_document.php" class="add-button">+ Προσθήκη νέου εγγράφου</a>';
                echo "</div>";
                echo "<br>";
            }

            require 'db_connection.php';

            $sql = "SELECT * FROM documents";
            $documents = mysqli_query($conn, $sql);
            if ($documents->num_rows > 0) {
                while ($row = $documents->fetch_assoc()) {
                    echo "<div class='document'>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    echo "<p><b>Περιγραφή:</b> " . $row['description'] . "</p>";
                    echo "<p><a href='" . $row['path'] . "'>Download</a></p>";
                    if ($role == "Tutor") {
                        echo "<div class='actions-container'>";
                        echo "<div class='actions'>";
                        echo "<a href='edit_document.php?id=" . $row['id'] . "'>Επεξεργασία</a>";
                        echo "<a href='delete_document.php?id=" . $row['id'] . "' onclick=\"return confirm('Είστε βέβαιος/βεβαία ότι θέλετε να διαγράψετε το έγγραφο;')\">Διαγραφή</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "Δεν υπάρχουν έγγραφα.";
            }
            ?>
        </div>
        </div>
    </div>
</div>
<input type="checkbox" id="top-checkbox">
<label for="top-checkbox" id="top-button">&#8593; Top</label>
<script src="scripts.js"></script>
</body>
</html>