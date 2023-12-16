<?php require 'check_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Εργασίες</title>
</head>
<body>
<div id="top"></div>
<div class="container">
    <div class="title">
        <h1>Εργασίες</h1>
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
                echo '<a href="add_homework.php" class="add-button">+ Προσθήκη νέας εργασίας</a>';
                echo "</div>";
                echo "<br>";
            }

            require 'db_connection.php';

            $sql = "SELECT * FROM homework";
            $homework = mysqli_query($conn, $sql);
            if ($homework->num_rows > 0) {
                $count = 1;
                while ($row = $homework->fetch_assoc()) {
                    $id = $row['id'];
                    echo "<div class='homework'>";
                    echo "<h2> Εργασία ". $count . "-" . $row['title'] . "</h2>";
                    echo "<p><b>Στόχοι: </b>Οι στόχοι της εργασίας είναι</p>";
                    echo "<ol>";
                    $sql2 = "SELECT * FROM goals WHERE homework_id = $id";
                    $goals = mysqli_query($conn, $sql2);
                    if ($goals->num_rows > 0) {
                        while ($row2 = $goals->fetch_assoc()){
                            echo "<li>". $row2['goal'] ."</li>";
                        }
                    } else {
                        echo "Δεν υπάρχουν στόχοι.";
                    }
                    echo "</ol>";
                    echo "<p><b>Εκφώνηση: </b>Κατεβάστε την εκφώνηση της εργασίας από <a href='" . $row['path'] ."'>εδώ</a></p>";
                    echo "<p><b>Παραδοτέα: </b></p>";
                    echo "<ol>";
                    $sql3 = "SELECT * FROM requirements WHERE homework_id = $id";
                    $requirements = mysqli_query($conn, $sql3);
                    if ($requirements->num_rows > 0) {
                        while ($row3 = $requirements->fetch_assoc()){
                            echo "<li>". $row3['requirement'] ."</li>";
                        }
                    } else {
                        echo "Δεν υπάρχουν παραδοτέα.";
                    }
                    echo "</ol>";
                    echo "<p><b><span style=\"color: #b03a3a;\">Ημερομηνία παράδοσης: </span></b>" . $row['date'] . "</p>";
                    if ($role == "Tutor") {
                        echo "<div class='actions-container'>";
                        echo "<div class='actions'>";
                        echo "<a href='edit_homework.php?id=" . $row['id'] . "'>Επεξεργασία</a>";
                        echo "<a href='delete_homework.php?id=" . $row['id'] . "' onclick=\"return confirm('Είστε βέβαιος/βεβαία ότι θέλετε να διαγράψετε το έγγραφο;')\">Διαγραφή</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                    $count += 1;
                }
            } else {
                echo "Δεν υπάρχουν εργασίες.";
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