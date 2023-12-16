<?php
$targetFile = $targetDir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$allowedExtensions = array("pdf", "doc", "docx");
$uploadedFileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Τύπος αρχείου
if (!in_array($uploadedFileExtension, $allowedExtensions)) {
    echo "Συγγνώμη, μόνο PDF, DOC και DOCX αρχεία είναι επιτρεπτά.";
    $uploadOk = 0;
}

// Μέγεθος του αρχείου
if ($_FILES["file"]["size"] > 500000) {
    echo "Συγγνώμη, το αρχείο είναι πολύ μεγάλο.";
    $uploadOk = 0;
}