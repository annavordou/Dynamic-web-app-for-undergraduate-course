<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Προσθήκη Εγγράφου</title>
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

        <div class="content">
            <div class="communication">
                <h2>Προσθήκη Εγγράφου</h2>
                <form action="process_add_document.php" method="post" enctype="multipart/form-data">
                    <label for="title">Τίτλος:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Περιγραφή:</label>
                    <textarea type="text" id="description" name="description" rows="4" required></textarea>
                    <label for="file">Αρχείο:</label>
                    <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required>

                    <button type="submit">Προσθήκη</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>