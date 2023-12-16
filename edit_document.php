<?php
require 'check_connection.php';

if (!isset($_GET['id'])) {
    header("Location: documents_tutor.php");
    exit();
}

require 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM documents WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Εγγράφου</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Έγγραφα Μαθήματος</h1>
    </div>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="communication">
                <h2>Επεξεργασία Εγγράφου</h2>
                <form method="post" action="update_document.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="title">Τίτλος:</label>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
                    <label for="description">Περιγραφή:</label>
                    <input type="text" name="description" value="<?php echo $row['description']; ?>"><br>
                    <label for="file">Αρχείο:</label>
                    <input type="file" id="file" name="file" accept=".pdf, .doc, .docx">
                    <?php if (!empty($row['path'])) { ?>
                        <p>Τρέχον αρχείο: <a href="<?php echo $row['path']; ?>" target="_blank"><?php echo $row['path']; ?></a></p>
                    <?php } ?>

                    <input type="submit" value="Αποθήκευση">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
