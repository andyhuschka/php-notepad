<?php
// Datei, in der die Notizen gespeichert werden
$file = 'notes.txt';

// Eingabedaten holen
$note = trim($_POST['note']);
if (!empty($note)) {
    file_put_contents($file, $note . PHP_EOL, FILE_APPEND | LOCK_EX);
}

// Zurück zur Startseite
header('Location: index.php');
exit();
?>
