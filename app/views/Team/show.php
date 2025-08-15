
<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="container mt-4">
    <h1 class="mb-3">Detalles del Equipo</h1>

    <?php if ($equipo): ?>
        <p><strong>Nombre:</strong> <?= $equipo['team_name'] ?></p>
        <p><strong>Puntos:</strong> <?= $equipo['points'] ?></p>
        <p><strong>Ciudad:</strong> <?= $equipo['city_name'] ?></p>
        <p><strong>Deporte:</strong> <?= $equipo['sport_name'] ?></p>

    <?php else: ?>
        <p>No se encontró el equipo.</p>
    <?php endif; ?>
</body>
</html>
