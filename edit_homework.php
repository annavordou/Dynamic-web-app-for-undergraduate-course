<?php
require 'check_connection.php';

if (!isset($_GET['id'])) {
    header("Location: documents.php");
    exit();
}

require 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM homework WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Εργασίας</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Εργασίες</h1>
    </div>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="communication">
                <h2>Επεξεργασία Εργασίας</h2>
                <form method="post" action="update_homework.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="title">Τίτλος:</label>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
                    <label for="goals">Στόχοι:</label>
                    <?php
                    $sql2 = "SELECT * FROM goals WHERE homework_id = $id";
                    $goals = mysqli_query($conn, $sql2);
                    if ($goals->num_rows > 0) {
                        while ($row2 = $goals->fetch_assoc()) {
                            echo "<input type='hidden' name='goal_id[]' value='" . $row2['id'] . "'>";
                            echo '<input type="text" name="goals[]" value="' . $row2['goal'] . '"><br>';
                        }
                    }
                    ?>
                    <label for="file">Εκφώνηση:</label>
                    <input type="file" id="file" name="file" accept=".pdf, .doc, .docx">
                    <?php if (!empty($row['path'])) { ?>
                        <p>Τρέχον αρχείο: <a href="<?php echo $row['path']; ?>" target="_blank"><?php echo $row['path']; ?></a></p>
                    <?php } ?>
                    <label for="goals">Παραδοτέα:</label>
                    <?php
                    $sql3 = "SELECT * FROM requirements WHERE homework_id = $id";
                    $requirements = mysqli_query($conn, $sql3);
                    if ($requirements->num_rows > 0) {
                        while ($row3 = $requirements->fetch_assoc()) {
                            echo "<input type='hidden' name='req_id[]' value='" . $row3['id'] . "'>";
                            echo '<input type="text" name="requirements[]" value="' . $row3['requirement'] . '"><br>';
                        }
                    }
                    ?>
                    <label for="date">Ημερομηνία:</label>
                    <input type="date" name="date" value="<?php echo $row['date']; ?>"><br>

                    <input type="submit" value="Αποθήκευση">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
