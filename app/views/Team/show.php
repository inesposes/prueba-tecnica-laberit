

<?php
$creationDate = new DateTime(htmlspecialchars($equipo['created_at']));
?>


<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-4">
    <h1 class="mb-3">Detalles equipo: <?= htmlspecialchars($equipo['team_name']) ?></h1>

    <?php if ($equipo): ?>
        <p><strong>Puntos:</strong> <?= htmlspecialchars($equipo['points']) ?></p>
        <p><strong>Ciudad:</strong> <?= htmlspecialchars($equipo['city_name']) ?></p>
        <p><strong>Deporte:</strong> <?= htmlspecialchars($equipo['sport_name']) ?></p>
        <p><strong>Fecha de alta:</strong> <?= $creationDate->format('d/m/Y H:i') ?></p>

    <?php else: ?>
        <p>No se encontró el equipo.</p>
    <?php endif; ?>

    <hr>

    <h2>Jugadores</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número</th>
                <th>Características</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php while($row = $players->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $row["player_name"] ?></td>
                <td><?= $row["playing_number"] ?></td>
                <td><?= $row["characteristics"] ?></td>
                <td>
                    <a href="index.php?controller=player&action=update&id=<?= $row['id'] ?>" class="btn btn-primary mb-3">Editar</a>            
                    <a href="index.php?controller=player&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger mb-3" onclick="return confirm('¿Estás seguro/a de que quieres eliminar este/a jugador/a?');">Eliminar</a>
                </td>
                
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

