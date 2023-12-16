<?php require 'check_connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Αρχική σελίδα</title>
</head>
<body>


<div class="container">
    <div class="title">
        <h1>Αρχική σελίδα</h1>
    </div>
    <?php require 'header.php';?>
    <br>
    <div class="row">
        <div class="column options">
            <?php require 'menu.php'; ?>
        </div>
        <div class="column content">
            <div class="index-content">
                <div class="welcome-section">
                    <h1>Καλώς ήρθατε στον δυναμικό ιστοχώρο για το προπτυχιακό μάθημα</h1>
                    <p>Ο ιστοχώρος μας προσφέρει μια εναλλακτική μέθοδο εκμάθησης HTML και διάφορων στοιχειωδών web
                        technologies. Ο στόχος μας είναι να σας παρέχουμε τα απαραίτητα εργαλεία και πληροφορίες
                        για να μάθετε και να αναπτύξετε τις δεξιότητές σας στον τομέα της ιστοσελίδων.</p>
                    <p>Στον ιστοχώρο μας θα βρείτε:</p>
                    <ul>
                        <li>Ανακοινώσεις: Τα τελευταία νέα και ενημερώσεις για το μάθημα</li>
                        <li>Επικοινωνία: Πώς να έρθετε σε επαφή μαζί μας για απορίες και συζητήσεις</li>
                        <li>Έγραφα μαθήματος: Τα αρχεία και τις πηγές που αφορούν το μάθημα</li>
                        <li>Εργασίες: Οι εργασίες που έχουν ανατεθεί και οι οδηγίες για την υποβολή τους</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
