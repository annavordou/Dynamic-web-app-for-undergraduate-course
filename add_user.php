<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Προσθήκη Χρήστη</title>
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

        <div class="content">
            <div class="communication">
                <h2>Προσθήκη Χρήστη</h2>
                <form action="process_add_user.php" method="post">
                    <label for="name">Όνομα:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="surname">Επίθετο:</label>
                    <input type="text" id="surname" name="surname" required>
                    <label for="loginname">Mail:</label>
                    <!-- Μήνυμα λάθους -->
                    <?php if (isset($_GET['error_message'])) { ?>
                        <p class="error"><?php echo $_GET['error_message']; ?></p>
                    <?php } ?>
                    <input type="text" id="loginname" name="loginname" required>
                    <label for="password">Κωδικός:</label>
                    <input type="password" id="password" name="password" required>
                    <label for="role">Ρόλος:</label>
                    <select id="role" name="role">
                        <option value="student">Student</option>
                        <option value="tutor">Tutor</option>
                    </select>

                    <button type="submit">Προσθήκη</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
