<!DOCTYPE html>
<html>
<head>
    <title>Crear jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Crear jugador</h1>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="player_name" class="form-control" required minlength="5" maxlength="50">
    </div>
    <div class="mb-3">
        <label class="form-label">Número de jugador</label>
        <input type="number" name="playing_number" class="form-control" required min="0" max="100">
    </div>
    <div class="mb-3">
        <label class="form-label">Características</label>
        <textarea 
            class="form-control" 
            id="characteristics" 
            name="characteristics" 
            rows="4" 
            placeholder="Describe al jugador" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Equipo</label>
        <select name="team_id" class="form-select" required>
            <option value="">Elige un equipo</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= htmlspecialchars($team['id']) ?>">
                    <?= htmlspecialchars($team['team_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_captain" id="is_captain" value="1">
        <label class="form-check-label" for="is_captain">
            Seleccionar como capitán de equipo
        </label>
    </div>

    <button class="btn btn-primary">Guardar</button>
</form>

<?php if (!empty($errors)): ?>
    <div class="text-danger mt-4">
        <p>Errores:</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
</body>
</html>
