<?php
// Datei, in der die Notizen gespeichert werden
$file = 'notes.txt';

// Notizen abrufen
if (file_exists($file)) {
    $notes = file($file, FILE_IGNORE_NEW_LINES);

    // Notiz löschen
    $index = intval($_POST['index']);
    if (isset($notes[$index])) {
        unset($notes[$index]);
        file_put_contents($file, implode(PHP_EOL, $notes) . PHP_EOL);
    }
}

// Zurück zur Startseite
header('Location: index.php');
exit();
?>
