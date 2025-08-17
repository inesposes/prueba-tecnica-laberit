<!DOCTYPE html>
<html>
<head>
    <title>Equipos deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<div> 
    <h1>EQUIPOequipo</h1>
    <p>Tu aliado a la hora de gestionar múltiples equipos deportivos</p>
</div>
<hr>
<h2>Equipos</h2>

<table class="table table-bordered">
    <a href="index.php?controller=team&action=create" class="btn btn-primary mb-3">Añadir equipo</a>
    <a href="index.php?controller=player&action=create" class="btn btn-primary mb-3 ms-2">Añadir jugador</a>

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
            <td>
                <a href="index.php?controller=team&action=show&id=<?= $row['id'] ?>" class="btn btn-success mb-3">+ Info</a>    
                <a href="index.php?controller=team&action=show&id=<?= $row['id'] ?>" class="btn btn-warning mb-3">Capitán</a>         
            </td>
            
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
