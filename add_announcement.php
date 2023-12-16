<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Προσθήκη Ανακοίνωσης</title>
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

        <div class="content">
            <div class="communication">
                <h2>Προσθήκη Ανακοίνωσης</h2>
                <form action="process_add_announcement.php" method="post">
                    <label for="date">Ημερομηνία:</label>
                    <input type="date" id="date" name="date" required>
                    <label for="theme">Θέμα:</label>
                    <input type="text" id="theme" name="theme" required>
                    <label for="body">Κείμενο:</label>
                    <textarea type="text" id="body" name="body" rows="5" required></textarea>

                    <button type="submit">Προσθήκη</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>