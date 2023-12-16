<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Προσθήκη Εργασίας</title>
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

        <div class="content">
            <div class="communication">
                <h2>Προσθήκη Εργασίας</h2>
                <form action="process_add_homework.php" method="post" enctype="multipart/form-data">
                    <label for="title">Τίτλος:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="goals">Στόχοι:</label>
                    <div id="goals-container">
                        <div>
                            <input type="text" name="goals[]" required>
                            <button type="button" onclick="removeGoalField(this)" class="remove-field">Αφαίρεση</button>
                        </div>
                    </div>
                    <button type="button" onclick="addGoalField()">Προσθήκη Στόχου</button>
                    <br>
                    <br>
                    <label for="file">Εκφώνηση:</label>
                    <input type="file" id="file" name="file" accept=".pdf, .doc, .docx" required>
                    <br>
                    <br>
                    <label for="requirements">Παραδοτέα:</label>
                    <div id="requirements-container">
                        <div>
                            <input type="text" name="requirements[]" required>
                            <button type="button" onclick="removeRequirementField(this)" class="remove-field">Αφαίρεση</button>
                        </div>
                    </div>
                    <button type="button" onclick="addRequirementField()">Προσθήκη Παραδοτέου</button>
                    <br>
                    <br>
                    <label for="date">Ημερομηνία:</label>
                    <input type="date" id="date" name="date" required>

                    <button type="submit">Προσθήκη</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="scripts.js"></script>
</body>
</html>