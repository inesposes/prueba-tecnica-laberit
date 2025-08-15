<!DOCTYPE html>
<html>
<head>
    <title>Create Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Crear equipo</h1>
<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="team_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Puntos</label>
        <input type="number" name="points" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ciudad</label>
        <select name="city_id" class="form-select" required>
            <option value="">Elige una ciudad</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= htmlspecialchars($city['id']) ?>">
                    <?= htmlspecialchars($city['city_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Deporte</label>
        <select name="city_id" class="form-select" required>
            <option value="">Elige un deporte</option>
            <?php foreach ($sports as $sport): ?>
                <option value="<?= htmlspecialchars($city['id']) ?>">
                    <?= htmlspecialchars($sport['sport_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-success">Save</button>
</form>

</body>
</html>
