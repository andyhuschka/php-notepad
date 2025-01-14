<?php
// Datei, in der die Notizen gespeichert werden
$file = 'notes.txt';

// Notizen abrufen
$notes = [];
if (file_exists($file)) {
    $notes = file($file, FILE_IGNORE_NEW_LINES);
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einfacher Notizblock</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .note { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { margin-left: 10px; }
    </style>
</head>
<body>
    <h1>Einfacher Notizblock</h1>
    
    <!-- Formular zum Hinzufügen neuer Notizen -->
    <form action="add_note.php" method="post">
        <textarea name="note" placeholder="Neue Notiz hinzufügen" required style="width:100%; height:100px;"></textarea><br>
        <button type="submit">Notiz speichern</button>
    </form>

    <h2>Notizen</h2>
    <?php if ($notes): ?>
        <?php foreach ($notes as $index => $note): ?>
            <div class="note">
                <?= htmlspecialchars($note) ?>
                <form action="delete_note.php" method="post" style="display:inline;">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <button type="submit" style="color:red;">Löschen</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Keine Notizen vorhanden.</p>
    <?php endif; ?>
</body>
</html>
