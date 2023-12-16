<?php
require 'check_connection.php';

if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit();
}

require 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Επεξεργασία Χρήστη</title>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Χρήστες</h1>
    </div>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="communication">
                <h2>Επεξεργασία Χρήστη</h2>
                <form method="post" action="update_user.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="name">Όνομα:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                    <label for="surname">Επίθετο:</label>
                    <input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br>
                    <label for="name">Mail:</label>
                    <input type="text" name="loginname" value="<?php echo $row['loginname']; ?>" disabled><br>
                    <input type="hidden" name="password" value="<?php echo $row['password']; ?>">
                    <label for="surname">Ρόλος:</label>
                    <select id="role" name="role">
                        <option value="Tutor" <?php if ($row['role'] === "Tutor") echo "selected"; ?>>Tutor</option>
                        <option value="Student" <?php if ($row['role'] === "Student") echo "selected"; ?>>Student</option>
                    </select>

                    <input type="submit" value="Αποθήκευση">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
