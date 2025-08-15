<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Teams</h1>

<table class="table table-bordered">
    <a href="index.php?action=create" class="btn btn-primary mb-3">Añadir equipo</a>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Ciudad</th>
            <th>Deporte</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $teams->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row["team_name"] ?></td>
            <td><?= $row["points"] ?></td>
            <td><?= $row["city_name"] ?></td>
            <td><?= $row["sport_name"] ?></td>
            <td><a href="index.php?action=show&id=<?= $row['id'] ?>" class="btn btn-primary mb-3">Ver</a>            </td>
            
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
