<!DOCTYPE html>
<html>
<head>
    <title>Ver capitán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container mt-4">
    <h1 class="mb-3">Capitán de  <?= htmlspecialchars($teamData['team_name']) ?></h1>

    <?php if ($captain): ?>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($captain['player_name']) ?></p>
        <p><strong>Número de jugador:</strong> <?= htmlspecialchars($captain['playing_number']) ?></p>
        <p><strong>Características:</strong> <?= htmlspecialchars($captain['characteristics']) ?></p>
    <?php else: ?>
        <p>El equipo no cuenta todavía con capitán.</p>
    <?php endif; ?>

</body>
</html>

