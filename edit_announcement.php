<?php
require 'check_connection.php';

if (!isset($_GET['id'])) {
    header("Location: announcement.php");
    exit();
}
require 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM announcements WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Ανακοίνωσης</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Ανακοινώσεις</h1>
    </div>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="communication">
                <h2>Επεξεργασία Ανακοίνωσης</h2>
                <form method="post" action="update_announcement.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="date">Ημερομηνία:</label>
                    <input type="date" name="date" value="<?php echo $row['date']; ?>"><br>
                    <label for="theme">Θέμα:</label>
                    <input type="text" name="theme" value="<?php echo $row['theme']; ?>"><br>
                    <label for="body">Περιεχόμενο:</label>
                    <textarea type="text" name="body" ><?php echo $row['body']; ?></textarea><br>

                    <input type="submit" value="Αποθήκευση">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
