<!DOCTYPE html>
<html>
<head>
    <title>Actualizar jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Actualizar jugador</h1>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="player_name" class="form-control" required minlength="5" maxlength="50" value="<?= htmlspecialchars($playerInfo['player_name'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Número de jugador</label>
        <input type="number" name="playing_number" class="form-control" required min="0" max="100" value="<?= htmlspecialchars($playerInfo['playing_number'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Características</label>
        <textarea 
            class="form-control" 
            id="characteristics" 
            name="characteristics" 
            rows="4" 
            required> <?= htmlspecialchars($playerInfo['characteristics'] ?? '') ?> </textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Equipo</label>
        <select name="team_id" class="form-select" required>
            <option value="">Elige un equipo</option>
            <?php foreach ($teams as $team): ?>
                <option value="<?= htmlspecialchars($team['id']) ?>"
                    <?= (isset($playerInfo['team_id']) && $playerInfo['team_id'] == $team['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($team['team_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-success">Guardar</button>
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
