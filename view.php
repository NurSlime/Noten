<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notenerfassung 2.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1>Notenerfassung 2.0</h1>

<?php if ($message): ?>
    <div class="alert alert-info">
        <?= $message ?>
    </div>
<?php endif; ?>

<!-- Form with multiple fields and button styling -->
<form method="POST" class="row g-3 mb-4">
    <div class="col-md-6">
        <label for="student" class="form-label">Name*</label>
        <input type="text" class="form-control" id="student" name="student" required>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">E-Mail</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="col-md-6">
        <label for="subject" class="form-label">Fach*</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
    </div>
    <div class="col-md-3">
        <label for="grade" class="form-label">Note*</label>
        <input type="number" class="form-control" id="grade" name="grade" min="1" max="5" required>
    </div>
    <div class="col-md-3">
        <label for="examDate" class="form-label">Prüfungsdatum*</label>
        <input type="date" class="form-control" id="examDate" name="examDate" required>
    </div>
    <div class="col-12">
        <button type="submit" name="add" class="btn btn-primary">Speichern</button>
       <!-- <button type="submit" name="delete" class="btn btn-secondary">Löschen</button> -->
    </div>
</form>

<h2>Noten</h2>
<?php if (!empty($grades)): ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Prüfungsdatum</th>
            <th>Fach</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($grades as $entry): ?>
            <tr>
                <td><?= htmlspecialchars($entry['student']) ?></td>
                <td><?= htmlspecialchars($entry['email']) ?></td>
                <td><?= htmlspecialchars($entry['examDate']) ?></td>
                <td><?= htmlspecialchars($entry['subject']) ?></td>
                <td><?= htmlspecialchars($entry['grade']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Keine Noten vorhanden.</p>
<?php endif; ?>

<form method="POST" class="mt-3">
    <button type="submit" name="delete" class="btn btn-danger">Alle Noten löschen</button>
</form>

</body>
</html>
