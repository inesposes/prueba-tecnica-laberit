
<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Equipo</title>
</head>
<body>
    <h1>Detalles del Equipo</h1>

    <?php if ($equipo): ?>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($equipo['team_name']) ?></p>
        <p><strong>Puntos:</strong> <?= htmlspecialchars($equipo['points']) ?></p>
        <p><strong>City ID:</strong> <?= htmlspecialchars($equipo['city_id']) ?></p>
    <?php else: ?>
        <p>No se encontró el equipo.</p>
    <?php endif; ?>
</body>
</html>
