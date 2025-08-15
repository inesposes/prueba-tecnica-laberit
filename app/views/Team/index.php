<!DOCTYPE html>
<html>
<head>
    <title>Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Teams</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Team name</th>
            <th>Points</th>
            <th>City ID</th>
            <th>Sport ID</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $teams->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["team_name"] ?></td>
            <td><?= $row["points"] ?></td>
            <td><?= $row["city_id"] ?></td>
            <td><?= $row["sport_id"] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
